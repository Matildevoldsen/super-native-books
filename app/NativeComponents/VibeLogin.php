<?php

namespace App\NativeComponents;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;
use Native\Mobile\Facades\SecureStorage;

/**
 * Real login flow — replaces the per-build VIBE_AUTH_TOKEN dance.
 *
 * POSTs credentials to bifrost's /api/v1/auth/login, stores the returned Sanctum
 * token in the device keychain (SecureStorage), and the AppServiceProvider
 * resolver hands it to vibe at subscribe-time. Each device logs in as itself, so
 * private/presence channels authenticate as distinct real users.
 */
class VibeLogin extends NativeComponent
{
    public string $email = '';

    public string $password = '';

    public ?string $loggedInAs = null;

    public string $status = 'Log in to authenticate private/presence channels as yourself.';

    public bool $loading = false;

    public function navTitle(): string
    {
        return 'Vibe — Login';
    }

    public function mount(): void
    {
        $this->loggedInAs = SecureStorage::get('vibe_user_name') ?: null;
    }

    public function setEmail(string $value): void
    {
        $this->email = trim($value);
    }

    public function setPassword(string $value): void
    {
        $this->password = $value;
    }

    public function login(): void
    {
        if ($this->loading) {
            return;
        }

        // The HTTP call blocks the handler and the loop only re-renders after it
        // returns — so flip to the loading state and publish this frame NOW,
        // before the blocking call, so the spinner actually shows.
        $this->loading = true;
        $this->status = 'Logging in…';
        $this->publishFinalState();

        // Reuse the single configured tunnel: swap the broadcasting-auth path
        // for the login path so there's one URL to configure.
        $loginUrl = str_replace('/broadcasting/auth', '/auth/login', (string) config('vibe.auth.endpoint'));

        try {
            $response = Http::acceptJson()
                ->withHeaders(['ngrok-skip-browser-warning' => 'true'])
                ->post($loginUrl, ['email' => $this->email, 'password' => $this->password]);

            if ($response->successful()) {
                SecureStorage::set('vibe_token', (string) $response->json('data.token'));
                SecureStorage::set('vibe_user_name', (string) $response->json('data.user.name'));

                // Straight into the demo. replace() (not navigate()) so Back from
                // the presence screen returns to the launcher, skipping login.
                $this->replace('/vibe-presence');

                return;
            } else {
                $this->status = 'Login failed ('.$response->status().'). Check your credentials.';
            }
        } catch (\Throwable $e) {
            $this->status = 'Error: '.$e->getMessage();
        }

        // Only reached on failure (success replace()s away above).
        $this->loading = false;
    }

    public function logout(): void
    {
        SecureStorage::delete('vibe_token');
        SecureStorage::delete('vibe_user_name');
        $this->loggedInAs = null;
        $this->status = 'Logged out.';
    }

    public function render(): View
    {
        return view('native.vibe-login');
    }
}
