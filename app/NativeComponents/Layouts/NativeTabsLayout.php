<?php

namespace App\NativeComponents\Layouts;

use App\Icons\Android;
use App\Icons\Ios;
use Native\Mobile\Edge\Element;
use Native\Mobile\Edge\Elements\Icon;
use Native\Mobile\Edge\Elements\Row;
use Native\Mobile\Edge\Elements\Text;
use Native\Mobile\Edge\Layouts\Builders\NavBar;
use Native\Mobile\Edge\Layouts\Builders\Tab;
use Native\Mobile\Edge\Layouts\Builders\TabBar;
use Native\Mobile\Edge\Layouts\NativeLayout;
use Native\Mobile\Edge\NativeComponent;

/**
 * `TabsLayout` clone that flips `usesNativeChrome()` to `true`. Routes
 * attached to this layout get their bottom bar rendered via SwiftUI's
 * `TabView` instead of the custom HStack-based `BottomNav` element.
 *
 * No `backgroundColor` set on the bar → on iOS 26+ the bar picks up
 * Liquid Glass material automatically. Set one to get the opaque-bar
 * behavior (X / Instagram pattern).
 */
class NativeTabsLayout extends NativeLayout
{
    public function usesNativeChrome(): bool
    {
        return true;
    }

    public function navBar(NativeComponent $screen): ?NavBar
    {
        return NavBar::make()
            ->back()
            ->title($screen->navTitle());
    }

    public function tabBar(NativeComponent $screen): ?TabBar
    {
        return TabBar::make()
            ->activeColor('#A855F7')
            ->minimizeOnScroll()
            ->add(Tab::link('Home', '/native-tabs',
                ios: Ios::House, android: Android::Home)->badge('3'))
            ->add(Tab::search(
                'Search',
                placeholder: 'Search articles, songs, people…',
                ios: Ios::Magnifyingglass,
                android: Android::Search,
            ))
            ->add(Tab::link('Profile', '/native-tabs/profile',
                ios: Ios::Person, android: Android::Person));
    }

    /**
     * Persistent MiniPlayer-style accessory pinned above the tab bar.
     * On iOS 26+ it inhabits the new `tabViewBottomAccessory` slot and
     * tucks inline with the active tab on scroll-down (paired with the
     * `minimizeOnScroll()` flag above). On older iOS this returns null
     * so nothing renders.
     */
    public function tabBarAccessory(NativeComponent $screen): ?Element
    {
        $row = Row::make()->center()->gap(8);
        $row->addChild(Icon::make('music.note'));
        $row->addChild(Text::make('Liquid Glass demo — scroll to minimize'));

        return $row;
    }
}
