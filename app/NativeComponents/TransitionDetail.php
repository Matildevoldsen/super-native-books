<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;

/**
 * Destination screen for the transitions showcase. Renders full-bleed in a
 * per-transition color (passed as navigation data) so the incoming screen
 * contrasts sharply with the outgoing one — which is what makes parallax /
 * slide / fade actually visible during the animation.
 */
class TransitionDetail extends NativeComponent
{
    public string $via = '';

    public string $color = '#14B8A6';

    public function mount(): void
    {
        $this->via = (string) $this->data('via', 'a transition');
        $this->color = (string) $this->data('color', '#14B8A6');
    }

    public function render(): View
    {
        return view('native.transitions.detail', ['via' => $this->via, 'color' => $this->color]);
    }
}
