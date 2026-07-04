<scroll-view class="bg-theme-background">
    <column class="w-full p-5 gap-4">

        <text class="text-lg font-semibold text-theme-on-background">Vibe — login</text>

        @if($loggedInAs)
            <column class="w-full bg-green-600 rounded-2xl p-4 gap-1">
                <text class="text-white font-semibold">Logged in as {{ $loggedInAs }}</text>
                <text class="text-sm text-white">Private/presence channels now authenticate as you.</text>
            </column>

            <stack @press="logout" class="bg-theme-surface-variant rounded-xl px-4 py-3 items-center justify-center">
                <text class="text-theme-on-surface-variant font-semibold">Log out</text>
            </stack>
        @else
            <outlined-text-input @change="setEmail" label="Email" placeholder="you@example.com" class="w-full" />
            <outlined-text-input @change="setPassword" secure label="Password" placeholder="password" class="w-full" />

            @if($loading)
                <row class="w-full bg-blue-600 rounded-xl px-4 py-3 items-center justify-center gap-2">
                    <activity-indicator class="text-white" />
                    <text class="text-white font-semibold">Logging in…</text>
                </row>
            @else
                <stack @press="login" class="w-full bg-blue-600 rounded-xl px-4 py-3 items-center justify-center">
                    <text class="text-white font-semibold">Log in</text>
                </stack>
            @endif
        @endif

        <text class="text-sm text-theme-on-surface-variant">{{ $status }}</text>

    </column>
</scroll-view>
