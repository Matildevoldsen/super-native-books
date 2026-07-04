<?php

namespace App\NativeComponents\Layouts;

use Native\Mobile\Edge\Layouts\NativeLayout;
use Native\Mobile\Edge\NativeComponent;
use Nativephp\NativeUi\Builders\Drawer;
use Nativephp\NativeUi\Concerns\HasLayoutDrawer;

/**
 * Demo layout for the content-agnostic side drawer (X-style side nav).
 *
 * The drawer is declared ONCE here and is shown on every screen routed
 * under this layout — no per-screen markup.
 *
 * No nav bar / `usesNativeChrome()`: a drawer is a top-level navigation
 * paradigm, so it shouldn't be pushed onto the demo launcher's shared
 * SwiftUI NavigationStack (which would render a system back chevron +
 * back-swipe instead of the drawer). The drawer host draws its own ☰
 * affordance (top-leading) and owns the left-edge swipe; each screen's blade
 * leaves room for it in a header row.
 *
 * Each screen may pick its presentation via `drawerMode()` ('modal' |
 * 'reveal'); the drawer contents (the `native.drawer-menu` view) are the
 * same on every screen.
 */
class DrawerLayout extends NativeLayout
{
    use HasLayoutDrawer;

    public function drawer(NativeComponent $screen): ?Drawer
    {
        $drawer = Drawer::make(view('native.drawer-menu'))->width(300);

        $mode = method_exists($screen, 'drawerMode') ? $screen->drawerMode() : 'modal';

        return $mode === 'reveal' ? $drawer->reveal() : $drawer->modal();
    }
}
