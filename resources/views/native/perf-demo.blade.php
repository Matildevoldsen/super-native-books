<column class="w-full h-full bg-theme-background">

    {{-- Stats panel — live numbers refresh every render --}}
    <column class="w-full p-4 gap-2 bg-slate-900">

        <row class="w-full items-start justify-between">
            <column class="gap-0.5">
                <text class="text-xs uppercase tracking-wider text-slate-400">PHP renders</text>
                <text class="text-3xl font-bold text-emerald-400">{{ $renderCount }}</text>
            </column>
            <column class="gap-0.5 items-end">
                <text class="text-xs uppercase tracking-wider text-slate-400">Element count</text>
                <text class="text-3xl font-bold text-sky-400">{{ number_format($lastElementCount) }}</text>
            </column>
        </row>

        <row class="w-full items-start justify-between pt-2">
            <column class="gap-0.5">
                <text class="text-xs uppercase tracking-wider text-slate-400">PHP build</text>
                <text class="text-xl font-bold text-white">{{ $lastBuildMs }} ms</text>
                <text class="text-xs text-slate-400">
                    {{ $lastElementCount > 0 ? round($lastBuildMs * 1000 / $lastElementCount, 1) . 'μs / element' : '—' }}
                </text>
            </column>
            <column class="gap-0.5 items-end">
                <text class="text-xs uppercase tracking-wider text-slate-400">Tap → render</text>
                <text class="text-xl font-bold text-white">{{ $lastActionToRenderMs }} ms</text>
                <text class="text-xs text-slate-400">{{ $lastRenderAt }}</text>
            </column>
        </row>

{{--        <text class="text-xs text-slate-400 pt-2">--}}
{{--            "PHP build" = time PHP spent constructing the element tree.--}}
{{--            "Tap → render" = wall-clock from your tap entering PHP to the build completing--}}
{{--            (the wire-ship + native parse are after this).--}}
{{--            "PHP renders" only ticks on state changes — scroll the list, it stays put.--}}
{{--        </text>--}}

        {{-- RN comparison context (published 2026 numbers, see notes) --}}
{{--        <column class="bg-slate-800 rounded-lg p-2 mt-2 gap-0.5">--}}
{{--            <text class="text-xs uppercase tracking-wider text-amber-400">vs React Native (2026, New Arch)</text>--}}
{{--            <text class="text-xs text-slate-300">--}}
{{--                RN published: ~900ms paint improvement on 1500-component renders (New Arch vs old bridge).--}}
{{--                Cold start ~4s. Frame budget 16.67ms.--}}
{{--                Bundle ~11MB+. Memory 155-280MB for scrollable lists.--}}
{{--            </text>--}}
{{--            <text class="text-xs text-slate-300">--}}
{{--                NativePHP: per-frame scrolling/animations/gestures = 0 PHP. Only discrete state changes go through PHP.--}}
{{--                Bundle dominated by embedded PHP runtime (~MB) + native UI (~MB).--}}
{{--            </text>--}}
{{--        </column>--}}

    </column>

    {{-- Stress controls — row-count buttons --}}
    <column class="w-full px-4 pt-3 pb-2 gap-2">
        <text class="text-xs uppercase tracking-wider text-theme-on-surface-variant">
            Re-build the tree at different sizes
        </text>
        <row class="gap-2">
            @foreach ([50, 500, 5000, 50000] as $n)
                <column
                    @press="setRows({{ $n }})"
                    class="flex-1 py-2 rounded-lg items-center justify-center bg-sky-500"
                    :opacity="$rowCount === $n ? 1 : 0.4"
                    :animate-duration="200">
                    <text class="text-white text-xs font-semibold">{{ number_format($n) }}</text>
                </column>
            @endforeach
        </row>
        <row class="gap-2">
            @foreach ([200, 1500] as $n)
                <column
                    @press="setRows({{ $n }})"
                    class="flex-1 py-2 rounded-lg items-center justify-center bg-sky-500"
                    :opacity="$rowCount === $n ? 1 : 0.4"
                    :animate-duration="200">
                    <text class="text-white text-xs font-semibold">{{ number_format($n) }}</text>
                </column>
            @endforeach
        </row>
        <text class="text-xs text-theme-on-surface-variant">
            Tap a size. With <virtual-list />, only the visible window is built —
            50,000 rows costs the same per render as 50.
        </text>
    </column>

    {{-- Windowed list — `count` is the logical total; PHP only emits
         rows inside [virtualWindowFrom..virtualWindowTo]. Native fires
         setVirtualWindow(from, to) as the visible range moves. --}}
    <virtual-list
        class="flex-1 w-full"
        :count="$rowCount"
        :from="$virtualWindowFrom"
        :to="$virtualWindowTo"
        :estimated-row-height="72"
        :overscan="40"
        item="native.perf-row"
        on-window-change="setVirtualWindow" />

</column>
