<?php

namespace App\NativeComponents;

use App\NativeComponents\Concerns\AuthenticatesWithVibe;
use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;
use Native\Mobile\Facades\Dialog;
use NativePHP\Vibe\Facades\Vibe;
use NativePHP\Vibe\PendingSubscription;

/**
 * Vibe POC — PRESENCE channel: who's online + live join/leave + peer chat.
 *
 * Chat uses Pusher CLIENT EVENTS (whisper) — ephemeral messages sent directly
 * between subscribers, no server, not persisted. The sender doesn't receive its
 * own whisper, so we echo it locally.
 */
class VibePresenceDemo extends NativeComponent
{
    use AuthenticatesWithVibe;

    // The roster + chat log mutate constantly; opt out of subtree memoization so
    // the growing lists can't hit the REUSE truncation bug.
    protected bool $forceFullFrames = true;

    // Distinctive name so we don't collide with strangers on the shared Vask app.
    public string $channel = 'vibe-nativephp-demo';

    /** @var array<string, string> online members: user id => display name */
    public array $members = [];

    /** @var array<int, string> ephemeral chat log ("Name: body") */
    public array $messages = [];

    public string $draft = '';

    /** Ephemeral "X is typing" state — driven by whispers, auto-cleared by a poll. */
    public ?string $typistName = null;

    public int $typingUntil = 0;

    protected ?PendingSubscription $sub = null;

    public function navTitle(): string
    {
        return 'Vibe — Presence';
    }

    public function mount(): void
    {
        if (! $this->requireVibeAuth()) {
            return;
        }

        $this->sub = Vibe::presence($this->channel)
            ->here(function (array $members) {
                $this->members = [];
                foreach ($members as $m) {
                    $this->members[(string) ($m['id'] ?? '')] = $this->name($m);
                }
            })
            ->joining(function (array $member) {
                Dialog::toast($this->name($member).' has joined');
                $this->members[(string) ($member['id'] ?? '')] = $this->name($member);
            })
            ->leaving(function (array $member) {
                Dialog::toast($this->name($member).' has left');
                unset($this->members[(string) ($member['id'] ?? '')]);
            })
            ->listenForWhisper('chat', function ($event) {
                $this->messages[] = ['from' => $event->from ?? '?', 'body' => $event->body ?? '', 'mine' => false];
                $this->typingUntil = 0;   // they sent → no longer typing
            })
            ->listenForWhisper('typing', function ($event) {
                $this->typistName = $event->from ?? 'Someone';
                $this->typingUntil = time() + 3;
            });
    }

    /** Fires on each keystroke — whisper a transient "typing" signal to peers. */
    public function onType(string $text): void
    {
        $this->draft = $text;
        $this->sub?->whisper('typing', ['from' => $this->vibeIdentity]);
    }

    public function send(): void
    {
        $body = trim($this->draft);
        if ($body === '' || $this->sub === null) {
            return;
        }

        // Whisper to the others; the sender never receives its own, so echo it.
        $this->sub->whisper('chat', ['from' => $this->vibeIdentity, 'body' => $body]);
        $this->messages[] = ['from' => $this->vibeIdentity ?? 'me', 'body' => $body, 'mine' => true];
        $this->draft = '';
    }

    /** Prefer the member's user_info name, fall back to their id. */
    protected function name(array $member): string
    {
        return $member['info']['name'] ?? ('user '.($member['id'] ?? '?'));
    }

    public function render(): View
    {
        return view('native.vibe-presence-demo');
    }
}
