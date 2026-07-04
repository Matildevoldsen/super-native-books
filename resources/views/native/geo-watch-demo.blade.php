<scroll-view class="safe-area bg-theme-background">
    <column class="w-full p-5 gap-4">

        <text class="text-lg font-semibold text-theme-on-background">Geolocation — streaming (watchPosition)</text>

        <text class="text-sm text-theme-on-surface-variant">Start streams continuous GPS fixes into the component via a persistent locationUpdated handler. Walk around (or simulate movement in the simulator) and the numbers tick live. Leaving this screen stops the watch automatically.</text>

        <row class="w-full items-center gap-2">
            <text class="text-sm font-semibold {{ $watching ? 'text-green-600' : 'text-theme-on-surface-variant' }}">{{ $watching ? '● watching' : '○ idle' }}</text>
        </row>

{{--        @if($error)--}}
{{--            <column class="w-full bg-red-100 rounded-2xl p-3">--}}
{{--                <text class="text-sm text-red-800">{{ $error }}</text>--}}
{{--            </column>--}}
{{--        @endif--}}

        <row class="w-full gap-3">
            <stack @press="startSteaming" class="flex-1 bg-blue-600 rounded-xl px-4 py-3 items-center justify-center">
                <text class="text-base font-semibold text-white">Start</text>
            </stack>
            <stack @press="stopStreaming" class="flex-1 bg-theme-surface-variant rounded-xl px-4 py-3 items-center justify-center">
                <text class="text-base font-semibold text-theme-on-surface">Stop</text>
            </stack>
        </row>

        <column class="w-full gap-1 items-center mt-2">
            <text class="text-4xl font-extrabold font-mono text-theme-on-background">{{ $updates }}</text>
            <text class="text-sm text-theme-on-surface-variant">updates received</text>
        </column>

        <column class="w-full bg-theme-surface-variant rounded-2xl p-4 gap-2">
            <row class="w-full justify-between">
                <text class="text-sm text-theme-on-surface-variant">latitude</text>
                <text class="text-sm font-mono text-theme-on-surface">{{ $latitude !== null ? number_format($latitude, 6) : '—' }}</text>
            </row>
            <row class="w-full justify-between">
                <text class="text-sm text-theme-on-surface-variant">longitude</text>
                <text class="text-sm font-mono text-theme-on-surface">{{ $longitude !== null ? number_format($longitude, 6) : '—' }}</text>
            </row>
            <row class="w-full justify-between">
                <text class="text-sm text-theme-on-surface-variant">accuracy</text>
                <text class="text-sm font-mono text-theme-on-surface">{{ $accuracy !== null ? number_format($accuracy, 1).' m' : '—' }}</text>
            </row>
            <row class="w-full justify-between">
                <text class="text-sm text-theme-on-surface-variant">speed</text>
                <text class="text-sm font-mono text-theme-on-surface">{{ $speed !== null ? number_format($speed, 1).' m/s' : '—' }}</text>
            </row>
            <row class="w-full justify-between">
                <text class="text-sm text-theme-on-surface-variant">heading</text>
                <text class="text-sm font-mono text-theme-on-surface">{{ $heading !== null ? number_format($heading, 0).'°' : '—' }}</text>
            </row>
        </column>

    </column>
</scroll-view>
