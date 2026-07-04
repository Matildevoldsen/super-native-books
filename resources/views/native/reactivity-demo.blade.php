<scroll-view class="w-full h-full bg-theme-background">
    <column class="w-full p-5 gap-5">

        <column class="w-full p-5 gap-3 bg-theme-surface-variant rounded-2xl ">
            <text class="text-2xl font-bold uppercase text-theme-on-surface-variant">Computed Props</text>

            <row class="items-center justify-between mt-2">
                <text class="text-xl text-theme-on-surface">Count</text>
                <text class="text-xl font-bold text-theme-on-surface">{{ $count }}</text>
            </row>
            <row class="items-center justify-between">
                <text class="text-xl text-theme-on-surface">Count x2</text>
                <text class="text-xl font-bold text-emerald-500">{{ $this->doubled }}</text>
            </row>

            <row class="gap-3 mt-2">
                <button @press="decrement" >-1</button>
                <spacer />
                <button @press="increment" >+1</button>
            </row>
        </column>


        <column class="w-full p-5 gap-3 bg-theme-surface-variant rounded-2xl text-xl">
            <text class="text-2xl font-bold uppercase text-theme-on-surface-variant">Native Polling</text>

            <column class="items-center justify-center py-4">
                <text native:poll.200ms class="text-xl font-bold text-violet-500">{{ now()->timezone('America/New_York')->format('D F j, Y H:i:s T') }}</text>
            </column>
        </column>
    </column>
</scroll-view>
