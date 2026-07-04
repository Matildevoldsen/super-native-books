<?php

use Native\Mobile\Testing\Native;

/**
 * Smoke test — every static demo screen mounts and publishes a wire tree
 * without throwing. Screens with bridge-driven mounts (vibe, geo) or
 * deliberately slow mounts (reactivity's #[Lazy] sleep) have their own tests.
 */
it('renders the demo screen without errors', function (string $uri) {
    expect(Native::visit($uri)->tree())->not->toBeEmpty();
})->with([
    'demo launcher' => '/',
    'counter' => '/counter',
    'typography' => '/explore/typography',
    'buttons' => '/explore/buttons',
    'buttons form' => '/buttons-form',
    'book shelf' => '/books',
    'icons' => '/explore/icons',
    'layout' => '/explore/layout',
    'cards' => '/explore/cards',
    'forms' => '/explore/forms',
    'sheets' => '/explore/sheets',
    'menus' => '/explore/menus',
    'mail inbox' => '/mail-demo',
    'pull to refresh' => '/refreshable-demo',
    'gestures' => '/gestures',
    'transitions' => '/transitions',
    'glass' => '/glass',
    'event channel' => '/event-channel-test',
    'tabs home' => '/tabs',
    'tabs browse' => '/tabs/browse',
    'tabs profile' => '/tabs/profile',
    'drawer' => '/drawer',
    'twitter feed' => '/twitter',
    'ikea home' => '/ikea',
    'syncup chats' => '/syncup-native',
    'syncup login' => '/syncup-native/login',
    'syncup friends' => '/syncup-native/friends',
    'syncup profile' => '/syncup-native/profile',
]);
