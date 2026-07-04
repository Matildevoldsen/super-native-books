<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;

/**
 * Side-drawer demo — reveal presentation (the content slides aside to
 * expose the drawer behind it). Same drawer as DrawerHome — the only
 * difference is `drawerMode()`.
 */
class DrawerReveal extends NativeComponent
{
    public function navTitle(): string
    {
        return 'Reveal Drawer';
    }

    public function drawerMode(): string
    {
        return 'reveal';
    }

    public function render(): View
    {
        return view('native.drawer-demo', ['mode' => 'reveal']);
    }
}
