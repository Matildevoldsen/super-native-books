<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;

/**
 * Isolates the native → PHP event channel (nphp_element_post_event + uint32
 * framing) so it can be verified independent of the render direction.
 *
 * The text box is UNCONTROLLED — no `value` / `native:model`, only `@change`.
 * So text flows ONE WAY: native → PHP through the event channel under test.
 * We never render the text back, which matters because the render direction
 * (PHP → native) still caps a single node's props at 64KB. A two-way bound box
 * would round-trip through BOTH directions and get clipped on the render-back,
 * masking the fact that the channel itself is now unbounded.
 *
 * Type or paste into the box; each change ships the WHOLE field back here.
 * `$len` is the byte count the channel actually delivered — paste past 65,535
 * and it should keep climbing and holding (pre-Phase-2 it crashed at 64KB).
 */
class EventChannelTest extends NativeComponent
{
    public int $len = 0;

    public string $sample = '';

    public function navTitle(): string
    {
        return 'Event Channel Test';
    }

    /** Fired on every keystroke/paste — the full field arrives via the channel. */
    public function onType(string $text): void
    {
        $this->len = strlen($text);
        $this->sample = substr($text, 0, 48);
    }

    public function clearStats(): void
    {
        $this->len = 0;
        $this->sample = '';
    }

    public function render(): View
    {
        return view('native.event-channel-test');
    }
}
