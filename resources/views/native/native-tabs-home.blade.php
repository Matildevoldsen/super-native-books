<scroll-view class="w-full h-full bg-theme-surface">
    <column class="w-full p-5 gap-4">

        <column class="w-full gap-2">
            <text class="text-2xl font-bold">Home tab</text>
            <text class="text-sm text-gray-500">
                Scroll this list down to see the tab bar minimize into a pill with the
                accessory tucked inline with the active tab. Scroll back to the top (or
                tap a tab) to expand it again. iOS 26+ only.
            </text>
        </column>

        <divider />

        <column class="w-full p-4 rounded-xl bg-[#F1F5F9] gap-2">
            <text class="text-[11] font-semibold text-[#64748B]">TAPS</text>
            <text class="text-2xl font-bold text-[#0F172A]">{{ $taps }}</text>
        </column>

        <column @press="tap" class="w-full px-4 py-3 rounded-xl bg-[#A855F7] items-center">
            <text class="text-white font-semibold">Tap me — increments counter</text>
        </column>

        <divider />

        <text class="text-base font-semibold mt-2">Activity</text>

        @foreach (range(1, 100) as $i)
            <row class="w-full p-4 rounded-xl bg-[#F8FAFC] items-center gap-3">
                <column class="w-12 h-12 rounded-full bg-[#A855F7] items-center justify-center">
                    <text class="text-white font-bold">{{ $i }}</text>
                </column>
                <column class="flex-1 gap-1">
                    <text class="text-[15] font-semibold text-[#0F172A]">Item #{{ $i }}</text>
                    <text class="text-[12] text-[#64748B]">
                        Filler row {{ $i }} of 30 — scroll past these to watch the bar shrink and the
                        accessory tuck inline with the Home tab icon.
                    </text>
                </column>
            </row>
        @endforeach

        <column class="w-full p-4 rounded-xl bg-[#F1F5F9] items-center gap-2 mt-3">
            <text class="text-sm text-gray-500">End of list — scroll back to the top to re-expand the bar.</text>
        </column>

    </column>
</scroll-view>
