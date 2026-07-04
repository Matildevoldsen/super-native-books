<scroll-view class="w-full h-full bg-theme-surface">
    <column class="w-full p-5 gap-5">

        <column class="w-full gap-2">
            <text class="text-2xl font-bold">Native chrome</text>
            <text class="text-sm text-gray-500">
                This screen routes through `NativeStackLayout`, which flips `usesNativeChrome()`
                to `true`. The bar above is rendered via SwiftUI's `NavigationStack` toolbar.
                On iOS 26+ it picks up Liquid Glass automatically since `backgroundColor` is unset.
            </text>
        </column>

        <divider />

        <column class="w-full gap-2">
            <text class="text-base font-semibold">What to verify</text>
            <text class="text-sm text-gray-500">• Title "Native Chrome" + subtitle stacked in the bar</text>
            <text class="text-sm text-gray-500">• Back chevron on the left fires PHP back navigation</text>
            <text class="text-sm text-gray-500">• Share icon + ellipsis on the right are tappable</text>
            <text class="text-sm text-gray-500">• On iOS 26+: bar uses translucent Liquid Glass</text>
        </column>

        <divider />

        <column class="w-full p-4 rounded-xl bg-[#F1F5F9] gap-2">
            <text class="text-[11] font-semibold text-[#64748B]">SHARE TAPS</text>
            <text class="text-2xl font-bold text-[#0F172A]">{{ $shareCount }}</text>
        </column>

        <column class="w-full p-4 rounded-xl bg-[#F1F5F9] gap-2">
            <text class="text-[11] font-semibold text-[#64748B]">LAST ACTION</text>
            <text class="text-base text-[#0F172A]">{{ $lastAction !== '' ? $lastAction : '—' }}</text>
        </column>

        <divider />

        <column class="w-full gap-2">
            <text class="text-base font-semibold">Multi-level stack</text>
            <text class="text-sm text-gray-500">
                Tap below to push a detail screen. Edge-swipe-back from there should pop you
                back here with the share counter intact.
            </text>
        </column>

        <column @press="pushDetail" class="w-full px-4 py-3 rounded-xl bg-[#A855F7] items-center">
            <text class="text-white font-semibold">View detail →</text>
        </column>

    </column>
</scroll-view>
