<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;

/**
 * Showcase for every page-transition type (`@navigate.<transition>`).
 *
 * The index uses native chrome (StackLayout → TopBar back chevron + title
 * from {@see navTitle()}). The destination ({@see TransitionDetail}) is
 * chrome-less, so navigating index → detail is a full tree replace that
 * rides the router-level path — which is where `@navigate` transitions
 * actually animate. (Native-chrome push/pop uses its own built-in
 * animation, so a chrome detail would hide the transitions.)
 */
class TransitionsDemo extends NativeComponent
{
    public function navTitle(): string
    {
        return 'Page Transitions';
    }

    public function render(): View
    {
        return view('native.transitions.index');
    }
}
