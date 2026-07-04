<column class="w-full h-full bg-theme-background">
    {{-- Header. The left padding (pl-16) clears the drawer host's floating
         ☰ button, which is drawn as an overlay at the top-leading corner. --}}
    <row class="items-center pl-16 pr-4 py-3 gap-2">
        <text class="text-lg font-bold text-theme-on-surface">
            {{ $mode === 'reveal' ? 'Reveal' : 'Modal' }} Drawer
        </text>
    </row>

    <scroll-view class="w-full flex-1 bg-theme-background">
        <column class="w-full px-6 pb-6 gap-4">
            <text class="text-base text-theme-on-surface-variant">
                Open the drawer with the ☰ button (top-left) or swipe in from the left edge.
            </text>

            <column class="w-full p-4 gap-2 rounded-xl bg-theme-surface-variant">
                <text class="text-sm text-theme-on-surface-variant">
                    {{ $mode === 'reveal'
                        ? 'Reveal mode pushes this content aside to expose the drawer sitting behind it.'
                        : 'Modal mode slides the drawer over this content with a dim scrim.' }}
                </text>
            </column>

            <column class="w-full p-4 gap-2 rounded-xl bg-theme-surface-variant">
                <text class="text-sm font-semibold text-theme-on-surface">Declared once</text>
                <text class="text-sm text-theme-on-surface-variant">
                    The same drawer is defined on DrawerLayout::drawer() and appears on every screen
                    routed under it — no per-screen markup. Switch between Modal and Reveal from inside
                    the drawer to see both presentations share one declaration.
                </text>
            </column>
        </column>
    </scroll-view>
</column>
