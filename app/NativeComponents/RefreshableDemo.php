<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\NativeComponent;

/**
 * Standalone demo of `<refreshable>` — pull-to-refresh on
 * **non-list** scrollable content. Use this when you have custom
 * card layouts, settings sections, grids, etc., and want native
 * pull-to-refresh. For list-shaped content, prefer
 * `<list @refresh>` which already wraps `.refreshable`.
 *
 * Section 20 of the /animate page tried to host this inside an
 * outer `<scroll-view>` — SwiftUI's `.refreshable` only fires
 * on the top-most ScrollView, so the inner one never saw the gesture.
 * Hence this dedicated page.
 */
class RefreshableDemo extends NativeComponent
{
    public array $cards = [];

    public int $refreshCount = 0;

    public function mount(): void
    {
        if (empty($this->cards)) {
            $this->cards = $this->seedCards();
        }
    }

    public function navTitle(): string
    {
        return 'Pull to refresh';
    }

    public function refresh(): void
    {
        $this->refreshCount++;
        array_unshift($this->cards, [
            'title'   => 'Refreshed at '.now()->format('H:i:s'),
            'subtitle' => 'Pulled #'.$this->refreshCount,
            'color'   => 'emerald-500',
        ]);
        // Cap to 12 to avoid unbounded growth.
        $this->cards = array_slice($this->cards, 0, 12);
    }

    public function render(): \Illuminate\View\View
    {
        return view('native.refreshable-demo', [
            'cards' => $this->cards,
            'refreshCount' => $this->refreshCount,
        ]);
    }

    private function seedCards(): array
    {
        return [
            ['title' => 'Welcome',          'subtitle' => 'Pull down to refresh ↓',         'color' => 'sky-500'],
            ['title' => 'Custom cards',     'subtitle' => 'Not list-items — bespoke layout', 'color' => 'violet-500'],
            ['title' => 'Native spinner',   'subtitle' => 'SwiftUI .refreshable on iOS, Compose PullToRefreshBox on Android', 'color' => 'amber-500'],
            ['title' => 'Zero PHP per pull','subtitle' => 'Callback fires once on release', 'color' => 'red-500'],
            ['title' => 'Min 800ms spinner','subtitle' => 'So quick handlers feel deliberate', 'color' => 'emerald-500'],
            ['title' => 'Grids work too',   'subtitle' => 'Wrap any scrollable, non-list content', 'color' => 'pink-500'],
        ];
    }
}
