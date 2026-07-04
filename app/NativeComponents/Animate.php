<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\NativeComponent;
use Native\Mobile\Edge\SharedValue;

/**
 * Animation playground — Phase 1a + 1b. Every section here is driven
 * by SwiftUI's `.animation(_, value:)` on iOS and Compose's
 * `animateFloatAsState` on Android. Both run on the platform's
 * render-server thread, so transitions stay smooth even while PHP is
 * busy publishing a new tree.
 */
class Animate extends NativeComponent
{
    // Toggle demo
    public bool $visible = true;
    public int $duration = 300;
    public string $easing = 'ease-in-out';

    // Step indicator
    public int $step = 1;

    // Card focus
    public int $focused = 0;

    // Crossfade
    public bool $cross = false;

    // Slide-in panel
    public bool $shown = false;

    // Toast (combined entry)
    public bool $toastShown = false;

    // Scale demo
    public bool $bumped = false;

    // Rotate demo (degrees)
    public int $angle = 0;

    // Like button
    public bool $liked = false;

    // Tab slider — index 0..3
    public int $activeTab = 0;

    // iOS-style switch
    public bool $switchOn = false;

    // FAB radial menu
    public bool $fabOpen = false;

    // Card stack — which card is "on top" (cycles 0..3)
    public int $topCard = 0;

    public function navTitle(): string
    {
        return 'Animations';
    }

    public function toggle(): void
    {
        $this->visible = ! $this->visible;
    }

    public function setEasing(string $easing): void
    {
        $this->easing = $easing;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    public function nextStep(): void
    {
        $this->step = min(5, $this->step + 1);
    }

    public function prevStep(): void
    {
        $this->step = max(1, $this->step - 1);
    }

    public function focus(int $index): void
    {
        $this->focused = $index;
    }

    public function swap(): void
    {
        $this->cross = ! $this->cross;
    }

    public function show(): void
    {
        $this->shown = ! $this->shown;
    }

    public function toggleToast(): void
    {
        $this->toastShown = ! $this->toastShown;
    }

    public function bump(): void
    {
        $this->bumped = ! $this->bumped;
    }

    public function spin(): void
    {
        $this->angle += 180;
    }

    public function resetSpin(): void
    {
        $this->angle = 0;
    }

    public function toggleLike(): void
    {
        $this->liked = ! $this->liked;
    }

    public function setTab(int $index): void
    {
        $this->activeTab = $index;
    }

    public function toggleSwitch(): void
    {
        $this->switchOn = ! $this->switchOn;
    }

    public function toggleFab(): void
    {
        $this->fabOpen = ! $this->fabOpen;
    }

    public function shuffleCards(): void
    {
        $this->topCard = ($this->topCard + 1) % 4;
    }

    public function render(): \Illuminate\View\View
    {
        // Fresh SharedValue for the drag demo on each render. Phase 3b
        // will persist these across renders so state survives sibling
        // button presses — for now the card resets to 0 if the user
        // taps anything that re-renders the screen.
        return view('native.animate', [
            'drag' => SharedValue::make(),
        ]);
    }
}
