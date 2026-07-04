<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;

/**
 * Side-drawer demo — modal presentation (drawer slides over the content
 * with a dim scrim). Shares the same drawer as DrawerReveal, declared once
 * on DrawerLayout.
 */
class DrawerHome extends NativeComponent
{
    public function navTitle(): string
    {
        return 'Modal Drawer';
    }

    public function drawerMode(): string
    {
        return 'modal';
    }

    public function render(): View
    {
        return view('native.drawer-demo', ['mode' => 'modal']);
    }
}
