<scroll-view>
    <column class="w-full h-full px-6 gap-6 py-8">
        <text class="text-2xl font-extrabold text-black">Gesture playground</text>

        {{-- Single tap + long press on one node — they coexist cleanly. --}}
        <stack @press="tapped" @longPress="longPressed"
               class="w-full bg-emerald-600 rounded-3xl shadow-xl p-8 items-center justify-center">
            <text class="text-white text-center text-xl font-semibold">Tap or long-press</text>
        </stack>

        {{-- Double-tap target. Uses @doubleTap alone (no @press) for a clean demo. --}}
        <stack @doubleTap="doubleTapped"
               class="w-full bg-indigo-600 rounded-3xl shadow-xl p-8 items-center justify-center">
            <text class="text-white text-center text-xl font-semibold">Double-tap</text>
        </stack>

        {{-- Latest gesture + per-gesture counters --}}
        <text class="text-center text-base font-medium text-black">{{ $gesture }}</text>

        <row class="gap-4">
            <column class="flex-1 bg-gray-100 rounded-2xl p-5 items-center gap-1">
                <text class="text-3xl font-extrabold text-emerald-600">{{ $taps }}</text>
                <text class="text-sm text-gray-500">taps</text>
            </column>
            <column class="flex-1 bg-gray-100 rounded-2xl p-5 items-center gap-1">
                <text class="text-3xl font-extrabold text-emerald-600">{{ $longPresses }}</text>
                <text class="text-sm text-gray-500">long-presses</text>
            </column>
        </row>

        <row class="gap-4">
            <column class="flex-1 bg-gray-100 rounded-2xl p-5 items-center gap-1">
                <text class="text-3xl font-extrabold text-indigo-600">{{ $doubleTaps }}</text>
                <text class="text-sm text-gray-500">double-taps</text>
            </column>
            <column class="flex-1 bg-gray-100 rounded-2xl p-5 items-center gap-1">
                <text class="text-3xl font-extrabold text-indigo-600">{{ $shakes }}</text>
                <text class="text-sm text-gray-500">shakes</text>
            </column>
        </row>
    </column>
</scroll-view>
