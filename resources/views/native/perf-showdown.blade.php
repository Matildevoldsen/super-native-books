<scroll-view class="w-full h-full bg-slate-900">
    <column class="w-full px-4 py-4 gap-3">

        <text class="text-2xl font-bold text-slate-50">Live Perf HUD</text>

        {{-- Stats card --}}
        <column class="w-full p-4 gap-2 bg-slate-800 rounded-xl" key="stats-card">
            <row class="items-center justify-between w-full">
                <text class="text-xs font-bold text-slate-400">LAST PUBLISH</text>
                <text class="text-xs font-semibold {{ $stats['was_skip'] ? 'text-amber-400' : 'text-green-500' }}">
                    {{ $stats['was_skip'] ? 'shadow-skip' : 'full publish' }}
                </text>
            </row>

            <text class="text-4xl font-bold text-slate-50">{{ $flatBytes }}</text>
            <text class="text-xs text-slate-400">flat buffer published to native</text>

            <row class="items-center justify-between w-full mt-2">
                <column class="gap-0.5">
                    <text class="text-xs text-slate-500">Nodes</text>
                    <text class="text-sm font-semibold text-slate-50">{{ number_format($stats['node_count']) }}</text>
                </column>
                <text class="text-xs text-slate-500">
                    FULL {{ number_format($stats['full_count']) }} · REUSE {{ number_format($stats['reuse_count']) }}
                </text>
            </row>

            <row class="items-center justify-between w-full">
                <column class="gap-0.5">
                    <text class="text-xs text-slate-500">Build time</text>
                    <text class="text-sm font-semibold text-slate-50">{{ number_format($stats['build_ms'], 3) }} ms</text>
                </column>
                <text class="text-xs text-slate-500">PHP zval → flat walk</text>
            </row>

            <row class="items-center justify-between w-full">
                <column class="gap-0.5">
                    <text class="text-xs text-slate-500">Total publish</text>
                    <text class="text-sm font-semibold text-slate-50">{{ number_format($stats['total_ms'], 3) }} ms</text>
                </column>
                <text class="text-xs text-slate-500">publish() entry → exit</text>
            </row>

            <row class="items-center gap-1 mt-1">
                <text class="text-xs {{ $memoOn ? 'text-green-500' : 'text-slate-500' }}">{{ $memoOn ? '●' : '○' }}</text>
                <text class="text-xs font-semibold {{ $memoOn ? 'text-slate-50' : 'text-slate-500' }}">Memo</text>
            </row>
        </column>

        {{-- Counter row --}}
        <row class="items-center w-full gap-3 mt-2">
            <pressable @press="tap" class="px-5 py-3 bg-sky-500 rounded-lg">
                <text class="text-base font-bold text-white">+1</text>
            </pressable>
            <pressable @press="tap10" class="px-5 py-3 bg-sky-500 rounded-lg">
                <text class="text-base font-bold text-white">+10</text>
            </pressable>
            <column class="flex-1" />
            <text class="text-base font-semibold text-slate-300">counter = {{ $counter }}</text>
        </row>

        {{-- Memo toggle --}}
        <pressable
            @press="toggleMemo"
            class="w-full px-3 py-2 rounded-lg {{ $memoOn ? 'bg-slate-800' : 'bg-slate-900' }} border border-slate-700"
        >
            <row class="items-center gap-2">
                <text class="text-sm {{ $memoOn ? 'text-green-500' : 'text-slate-400' }}">{{ $memoOn ? '●' : '○' }}</text>
                <text class="text-sm font-semibold {{ $memoOn ? 'text-slate-50' : 'text-slate-400' }}">
                    Memo (Phase 2) — {{ $memoOn ? 'on' : 'off' }}
                </text>
            </row>
        </pressable>

        <text class="text-xs text-slate-500 mt-2">
            {{ $rowCount }} static rows — these become REUSE markers when memo is on.
        </text>

        {{-- The REUSE feeder --}}
        <column class="w-full gap-1" key="static-list">
            @foreach ($rows as $row)
                <row
                    :key="$row['key']"
                    class="items-center justify-between w-full px-3 py-1.5 bg-slate-800 rounded-md"
                >
                    <text class="text-sm text-slate-300">{{ $row['label'] }}</text>
                    <text class="text-xs text-slate-500">{{ $row['value'] }}</text>
                </row>
            @endforeach
        </column>

    </column>
</scroll-view>
