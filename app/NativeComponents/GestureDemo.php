<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Attributes\On;
use Native\Mobile\Edge\NativeComponent;
use Native\Mobile\Events\Motion\ShakeDetected;

class GestureDemo extends NativeComponent
{
    public string $gesture = 'Tap, long-press or double-tap a card, or shake the device';

    public int $doubleTaps = 0;

    public int $shakes = 0;

    public int $taps = 0;

    public int $longPresses = 0;

    public function navTitle(): string
    {
        return 'Gestures';
    }

    /** Per-node double-tap — fired by `@doubleTap` on the card. */
    public function doubleTapped(): void
    {
        $this->doubleTaps++;
        $this->gesture = "Double-tapped {$this->doubleTaps}×!";
    }

    /** Single tap — fired by `@press`. */
    public function tapped(): void
    {
        $this->taps++;
        $this->gesture = "Tapped {$this->taps} time(s)";
    }

    /** Long press — fired by `@longPress`. */
    public function longPressed(): void
    {
        $this->longPresses++;
        $this->gesture = "Long-pressed {$this->longPresses} time(s)";
    }

    /** Device shake — a native-motion event, no node attached. */
    #[On(ShakeDetected::class)]
    public function onShake(): void
    {
        $this->shakes++;
        $this->gesture = "Shaken {$this->shakes}×!";
    }

    public function render(): View
    {
        return view('native.gesture-demo');
    }
}
