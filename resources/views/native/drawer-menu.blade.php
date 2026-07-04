{{-- Arbitrary drawer content — any elements you want. Declared once on
     DrawerLayout::drawer() and rendered into the side drawer on every screen. --}}
<column class="w-full h-full bg-theme-surface">
    {{-- Header --}}
    <column class="w-full px-5 pt-16 pb-5 gap-2 bg-theme-surface-variant">
        <column class="w-[56] h-[56] rounded-full items-center justify-center bg-[#6366F1]">
            <icon name="star.fill" :size="26" color="#FFFFFF" />
        </column>
        <text class="text-lg font-bold text-theme-on-surface">Ada Lovelace</text>
        <text class="text-sm text-theme-on-surface-variant">Side drawer demo</text>
    </column>

    {{-- Menu items — plain rows that navigate() --}}
    <column class="w-full px-3 py-3 gap-1">
        <row @press="navigate('/drawer')" class="items-center gap-3 px-3 py-3 rounded-xl">
            <icon name="sparkles" :size="22" color="#6366F1" />
            <text class="text-base text-theme-on-surface">Modal drawer</text>
        </row>
        <row @press="navigate('/drawer/reveal')" class="items-center gap-3 px-3 py-3 rounded-xl">
            <icon name="bolt.fill" :size="22" color="#6366F1" />
            <text class="text-base text-theme-on-surface">Reveal drawer</text>
        </row>

        <divider class="my-2" />

        <row @press="navigate('/')" class="items-center gap-3 px-3 py-3 rounded-xl">
            <icon name="dashboard" :size="22" color="#9CA3AF" dark-color="#94A3B8" />
            <text class="text-base text-theme-on-surface">All demos</text>
        </row>
    </column>
</column>
