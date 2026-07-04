<?php

namespace App\NativeComponents;

use App\NativeComponents\Concerns\AuthenticatesWithVibe;
use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;
use NativePHP\Vibe\Facades\Vibe;

/**
 * Vibe POC — receive events on a PRIVATE channel (auth required).
 *
 * Subscribing to `private-*` triggers the native SDK to POST to the remote
 * /broadcasting/auth (bifrost) with the app's bearer token; only on a valid
 * signed response does Vask complete the subscription. Broadcast to it with:
 *   php artisan vibe:test-broadcast "shipped!" --channel=private-orders.42 --event=OrderShipped
 */
class VibePrivateDemo extends NativeComponent
{
    use AuthenticatesWithVibe;

    public string $channel = 'orders.42';

    public string $lastMessage = '(waiting for a private broadcast...)';

    public int $count = 0;

    /** Surfaced native failure — e.g. a 403 from /broadcasting/auth. */
    public ?string $lastError = null;

    public function navTitle(): string
    {
        return 'Vibe — Private Channel';
    }

    public function mount(): void
    {
        if (! $this->requireVibeAuth()) {
            return;
        }

        Vibe::private($this->channel)
            ->on('OrderShipped', function ($event) {
                $this->lastMessage = $event->message;
                $this->count++;
            })
            // Auth rejections (bad token, dead VIBE_AUTH_ENDPOINT tunnel) used
            // to fail silently; now they land here as vibe:error.
            ->onError(fn ($event) => $this->lastError = "{$event->type}: {$event->message}");
    }

    public function render(): View
    {
        return view('native.vibe-demo');
    }
}
