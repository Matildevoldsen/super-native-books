<?php

namespace App\NativeComponents\Concerns;

use Native\Mobile\Facades\SecureStorage;

/**
 * Gate a screen behind a stored Sanctum token (set by the VibeLogin screen).
 * Call requireVibeAuth() first thing in mount() — it redirects to the login
 * screen when no token is present, and exposes the current identity + logout.
 */
trait AuthenticatesWithVibe
{
    public ?string $vibeIdentity = null;

    /** Redirect to login if there's no token. Returns true when authenticated. */
    protected function requireVibeAuth(): bool
    {
        if (! SecureStorage::get('vibe_token')) {
            $this->replace('/vibe-login');

            return false;
        }

        $this->vibeIdentity = SecureStorage::get('vibe_user_name');

        return true;
    }

    public function logout(): void
    {
        SecureStorage::delete('vibe_token');
        SecureStorage::delete('vibe_user_name');
        $this->replace('/vibe-login');
    }
}
