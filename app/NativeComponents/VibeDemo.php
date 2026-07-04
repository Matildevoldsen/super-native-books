<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;
use NativePHP\Vibe\Attributes\OnEcho;
use NativePHP\Vibe\Facades\Vibe;

/**
 * Vibe POC — receive live broadcast events over the websocket.
 *
 * On mount we subscribe the native socket to a public channel. When the server
 * broadcasts `TestEvent` (try `php artisan vibe:test-broadcast "hi"`), it
 * arrives as a channel-scoped native event and is delivered BOTH ways Vibe
 * supports — the fluent ->on() closure and the #[OnEcho] attribute method —
 * so this screen exercises the two listener paths side by side. PHP never
 * broadcasts — it is purely a client subscriber.
 *
 * Also wires the connection lifecycle: a live/reconnecting badge
 * (onDisconnect/onReconnect) and the last native error (onError — e.g. a
 * failed subscription), which would otherwise be invisible on-device.
 */
class VibeDemo extends NativeComponent
{
    public string $channel = 'test-channel';

    public string $lastMessage = '(waiting for a broadcast...)';

    public int $count = 0;

    /** Same event, delivered via the #[OnEcho] attribute path. */
    public int $viaAttribute = 0;

    public bool $live = true;

    public ?string $lastError = null;

    public function navTitle(): string
    {
        return 'Vibe — Live Events';
    }

    public function mount(): void
    {
        Vibe::channel($this->channel)
            ->on('TestEvent', function ($event) {
                $this->lastMessage = $event->message;
                $this->count++;
            })
            ->onDisconnect(fn () => $this->live = false)
            ->onReconnect(function () {
                // Websockets don't replay missed messages — refetch
                // authoritative state here in a real app.
                $this->live = true;
                $this->lastError = null;   // transient errors are moot once we're back
            })
            ->onError(fn ($event) => $this->lastError = "{$event->type}: {$event->message}");
    }

    /** The attribute path: channel-scoped, auto-torn-down on unmount. */
    #[OnEcho('TestEvent', channel: 'test-channel')]
    public function onTestEvent(string $message): void
    {
        $this->viaAttribute++;
    }

    public function render(): View
    {
        return view('native.vibe-demo');
    }
}
