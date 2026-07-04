<scroll-view class="w-full bg-theme-background">
    <column class="w-full p-5 gap-5">

        {{-- FLEX --}}
        <text class="text-lg font-semibold text-theme-on-background">Flex layout</text>
        <text class="text-sm text-theme-on-surface-variant">flex-1 distributes remaining space equally.</text>

        <row class="w-full gap-2 h-[60]">
            <column class="flex-1 bg-blue-500 rounded items-center justify-center">
                <text class="text-white">flex-1</text>
            </column>
            <column class="flex-1 bg-green-500 rounded items-center justify-center">
                <text class="text-white">flex-1</text>
            </column>
            <column class="flex-1 bg-purple-500 rounded items-center justify-center">
                <text class="text-white">flex-1</text>
            </column>
        </row>

        <text class="text-sm text-theme-on-surface-variant">Mix of fixed widths and flex-1.</text>
        <row class="w-full gap-2 h-[60]">
            <column class="w-[60] bg-amber-500 rounded items-center justify-center">
                <text class="text-white text-xs">60</text>
            </column>
            <column class="flex-1 bg-rose-500 rounded items-center justify-center">
                <text class="text-white">flex-1</text>
            </column>
            <column class="w-[100] bg-teal-500 rounded items-center justify-center">
                <text class="text-white text-xs">100</text>
            </column>
        </row>

        <divider class="my-2"/>

        {{-- STACK --}}
        <text class="text-lg font-semibold text-theme-on-background">Stack (layered)</text>
        <text class="text-sm text-theme-on-surface-variant">Children layer on top of each other (centered).</text>

        <row class="w-full gap-6 items-center">
            <stack class="w-[100] h-[100]">
                <column class="w-[100] h-[100] rounded-full bg-blue-500"/>
                <column class="w-[60] h-[60] rounded-full bg-amber-400"/>
                <column class="w-[24] h-[24] rounded-full bg-red-500"/>
            </stack>

            <stack class="w-[160] h-[80]">
                <column class="w-[160] h-[80] rounded-lg bg-purple-600 items-center justify-center">
                    <text class="text-white">Background</text>
                </column>
                <column class="w-[110] h-[40] rounded-lg bg-amber-400 items-center justify-center">
                    <text class="text-amber-950 font-semibold">Foreground</text>
                </column>
            </stack>
        </row>

        <divider class="my-2"/>

        {{-- SHAPE PRIMITIVES --}}
        <text class="text-lg font-semibold text-theme-on-background">Shape primitives</text>
        <text class="text-sm text-theme-on-surface-variant">rect / circle — fill a frame with a color.</text>

        <row class="w-full gap-3">
            <rect class="flex-1 h-[60] bg-blue-500 rounded"/>
            <rect class="flex-1 h-[60] bg-green-500 rounded-lg"/>
            <rect class="flex-1 h-[60] bg-purple-500 rounded-3xl"/>
        </row>

        <row class="w-full gap-3 items-center">
            <circle class="w-[80] h-[80] bg-red-500"/>
            <circle class="w-[60] h-[60] bg-amber-500"/>
            <circle class="w-[40] h-[40] bg-emerald-500"/>
            <circle class="w-[24] h-[24] bg-blue-500"/>
        </row>

        <divider class="my-2"/>

        {{-- ACTIVITY INDICATOR --}}
        <text class="text-lg font-semibold text-theme-on-background">Activity indicator</text>
        <row class="w-full gap-4 items-center">
            <activity-indicator size="small"/>
            <activity-indicator size="medium"/>
            <activity-indicator size="large"/>
            <activity-indicator size="large" class="text-yellow-500"/>
            <activity-indicator size="large" class="text-red-500"/>
            <activity-indicator size="large" class="text-purple-500"/>
            <activity-indicator size="large" class="text-emerald-500"/>
            <activity-indicator size="large" class="text-fuchsia-500"/>
        </row>

        <divider class="my-2"/>

        {{-- SPACER --}}
        <text class="text-lg font-semibold text-theme-on-background">Spacer</text>
        <text class="text-sm text-theme-on-surface-variant">Pushes content apart inside a flex container.</text>
        <row class="w-full p-3 bg-theme-surface-variant rounded items-center">
            <text class="font-semibold text-theme-on-surface">Left</text>
            <spacer/>
            <text class="font-semibold text-theme-on-surface">Right</text>
        </row>

        <divider class="my-2"/>

        {{-- BOTTOM NAV — visual mockup composed from primitives. The real
             <bottom-nav> element is purpose-built to anchor at the
             bottom of the screen via a layout's tabBar(); inline rendering
             collapses because the renderer expects to fill the screen-edge
             frame from the layout chrome. The mockups below show what the
             bar looks like in the various configurations.

             To use a real bottom nav, attach a TabsLayout to your route —
             see /tabs in the launcher. --}}
        <text class="text-lg font-semibold text-theme-on-background">Bottom Nav (mockup)</text>
        <text class="text-sm text-theme-on-surface-variant">Tabs render via UITabBar on iOS / Material BottomNavigation on
            Android. The layouts below are stylistic mockups built from primitives.
        </text>

        {{-- 3-item basic --}}
        <row class="w-full h-[64] bg-theme-surface rounded-xl border border-theme-outline items-center">
            <column class="flex-1 items-center gap-1">
                <icon name="home" :size="22" color="#3B82F6"/>
                <text class="text-[11] text-blue-500 text-center font-semibold">Home</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <icon name="search" :size="22" color="#9CA3AF" dark-color="#94A3B8"/>
                <text class="text-[11] text-theme-on-surface-variant text-center">Search</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <icon name="person" :size="22" color="#9CA3AF" dark-color="#94A3B8"/>
                <text class="text-[11] text-theme-on-surface-variant text-center">Profile</text>
            </column>
        </row>

        <text class="text-sm text-theme-on-surface-variant">With badge + "news" indicator.</text>
        <row class="w-full h-[64] bg-theme-surface rounded-xl border border-theme-outline items-center">
            <column class="flex-1 items-center gap-1">
                <icon name="home" :size="22" color="#3B82F6"/>
                <text class="text-[11] text-blue-500 text-center font-semibold">Feed</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <stack class="w-[32] h-[24]">
                    <icon name="notifications" :size="22" color="#9CA3AF" dark-color="#94A3B8"/>
                    <row class="w-[32] h-[24] items-start justify-end">
                        <column class="w-[16] h-[14] rounded-full bg-red-500 items-center justify-center">
                            <text class="text-[9] font-bold text-white">3</text>
                        </column>
                    </row>
                </stack>
                <text class="text-[11] text-theme-on-surface-variant text-center">Alerts</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <stack class="w-[32] h-[24]">
                    <icon name="chat" :size="22" color="#9CA3AF" dark-color="#94A3B8"/>
                    <row class="w-[32] h-[24] items-start justify-end">
                        <column class="w-[8] h-[8] rounded-full bg-red-500"/>
                    </row>
                </stack>
                <text class="text-[11] text-theme-on-surface-variant text-center">Messages</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <icon name="person" :size="22" color="#9CA3AF" dark-color="#94A3B8"/>
                <text class="text-[11] text-theme-on-surface-variant text-center">Profile</text>
            </column>
        </row>

        <text class="text-sm text-theme-on-surface-variant">5-item nav with custom active color.</text>
        <row class="w-full h-[64] bg-theme-surface rounded-xl border border-theme-outline items-center">
            <column class="flex-1 items-center gap-1">
                <icon name="home" :size="20" color="#9CA3AF" dark-color="#94A3B8"/>
                <text class="text-[10] text-theme-on-surface-variant text-center">Home</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <icon name="search" :size="20" color="#9CA3AF" dark-color="#94A3B8"/>
                <text class="text-[10] text-theme-on-surface-variant text-center">Search</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <icon name="add" :size="20" color="#E11D48"/>
                <text class="text-[10] text-rose-600 text-center font-semibold">Post</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <icon name="bookmark" :size="20" color="#9CA3AF" dark-color="#94A3B8"/>
                <text class="text-[10] text-theme-on-surface-variant text-center">Saved</text>
            </column>
            <column class="flex-1 items-center gap-1">
                <icon name="person" :size="20" color="#9CA3AF" dark-color="#94A3B8"/>
                <text class="text-[10] text-theme-on-surface-variant text-center">Me</text>
            </column>
        </row>

    </column>
</scroll-view>
