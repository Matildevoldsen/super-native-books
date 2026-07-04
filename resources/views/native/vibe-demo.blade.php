<scroll-view class="safe-area bg-theme-background">
    <column class="w-full p-5 gap-4">

        @include('native._vibe-account')

        <text class="text-lg font-semibold text-theme-on-background">Vibe — live broadcast events</text>

        <text class="text-sm text-theme-on-surface-variant">Subscribed to channel "{{ $channel }}". Trigger an event from your server and it should appear below instantly.</text>

        <text class="text-sm font-mono text-theme-on-surface-variant">php artisan vibe:test-broadcast "hi"</text>

        @isset($live)
            <row class="w-full items-center gap-2">
                <text class="text-sm font-semibold {{ $live ? 'text-green-600' : 'text-amber-600' }}">{{ $live ? '● live' : '○ reconnecting…' }}</text>
            </row>
        @endisset

        @if($lastError ?? null)
            <column class="w-full bg-red-100 rounded-2xl p-3">
                <text class="text-sm font-semibold text-red-800">vibe:error</text>
                <text class="text-sm text-red-800">{{ $lastError }}</text>
            </column>
        @endif

        <column class="w-full gap-1 items-center mt-2">
            <text class="text-4xl font-extrabold font-mono text-theme-on-background">{{ $count }}</text>
            <text class="text-sm text-theme-on-surface-variant">events received</text>
            @isset($viaAttribute)
                <text class="text-sm text-theme-on-surface-variant">{{ $viaAttribute }} via #[OnEcho] attribute</text>
            @endisset
        </column>

        <column class="w-full bg-theme-surface-variant rounded-2xl p-4 items-center justify-center">
            <text class="text-base text-theme-on-surface font-semibold text-center">{{ $lastMessage }}</text>
        </column>

    </column>
</scroll-view>
