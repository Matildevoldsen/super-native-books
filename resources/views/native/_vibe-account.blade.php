@if(! empty($vibeIdentity ?? null))
    <row class="w-full items-center justify-between bg-theme-surface-variant rounded-2xl px-4 py-2">
        <row class="items-center gap-3">
            <image src="https://i.pravatar.cc/80?u={{ urlencode($vibeIdentity) }}" class="w-[34] h-[34] rounded-full" :fit="2" />
            <row class="items-center gap-1">
                <text class="text-base text-theme-on-surface">Signed in as</text>
                <text class="text-base font-bold text-theme-on-surface">{{ $vibeIdentity }}</text>
            </row>
        </row>
        <stack @press="logout" class="px-2 py-1">
            <text class="text-base font-semibold text-red-500">Log out</text>
        </stack>
    </row>
@endif
