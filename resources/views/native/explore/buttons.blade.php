<scroll-view class="w-full bg-theme-background">
    <column class="w-full p-5 gap-5">

        {{-- Variants --}}
        <text class="text-lg font-semibold text-theme-on-background">Variants</text>
        <row class="w-full gap-2 flex-wrap items-center">
            <button variant="primary" @press="increment">Primary</button>
            <button variant="secondary" @press="increment">Secondary</button>
            <button variant="destructive" @press="decrement">Destructive</button>
            <button variant="ghost" @press="increment">Ghost</button>
        </row>

        {{-- Sizes --}}
        <text class="text-lg font-semibold text-theme-on-background">Sizes</text>
        <row class="w-full gap-2 items-center flex-wrap">
            <button variant="primary" size="sm" @press="increment">Small</button>
            <button variant="primary" size="md" @press="increment">Medium</button>
            <button variant="primary" size="lg" @press="increment">Large</button>
        </row>

        {{-- With icons --}}
        <text class="text-lg font-semibold text-theme-on-background">With icons</text>
        <row class="w-full gap-2 items-center flex-wrap">
            <button variant="primary" icon="add" @press="increment">Add item</button>
            <button variant="secondary" icon-trailing="arrow.right" @press="increment">Next</button>
            <button variant="destructive" icon="delete" @press="decrement">Delete</button>
        </row>

        {{-- States --}}
        <text class="text-lg font-semibold text-theme-on-background">States</text>
        <row class="w-full gap-2 items-center flex-wrap">
            <button variant="primary" @press="increment">Enabled</button>
            <button variant="primary" disabled @press="increment">Disabled</button>
            <button variant="primary" loading @press="increment">Loading</button>
        </row>

        <divider class="my-2"/>

        {{-- Pressable escape hatch — bright accent pills stay vivid in both modes --}}
        <text class="text-lg font-semibold text-theme-on-background">Pressable (custom)</text>
        <row class="w-full gap-2 flex-wrap">
            <pressable @press="increment" class="bg-pink-500 rounded-full px-6 py-2 items-center justify-center">
                <text class="text-white font-semibold">Pink Pill</text>
            </pressable>
            <pressable @press="increment" class="bg-teal-500 rounded-full px-6 py-2 items-center justify-center">
                <text class="text-white font-semibold">Teal Pill</text>
            </pressable>
            <pressable @press="increment"
                              class="border-2 border-blue-500 rounded-lg px-5 py-2 items-center justify-center">
                <text class="text-blue-500 font-semibold">Outlined</text>
            </pressable>
        </row>

        <row class="w-full gap-3 items-center">
            <pressable @press="increment"
                              class="w-[48] h-[48] rounded-full bg-blue-500 items-center justify-center">
                <icon name="add" :size="24" color="#FFFFFF"/>
            </pressable>
            <pressable @press="decrement"
                              class="w-[48] h-[48] rounded-full bg-red-500 items-center justify-center">
                <icon name="minus.circle.fill" :size="24" color="#FFFFFF"/>
            </pressable>
            <pressable @press="increment"
                              class="w-[48] h-[48] rounded-full bg-green-500 items-center justify-center">
                <icon name="check" :size="24" color="#FFFFFF"/>
            </pressable>
            <pressable @press="increment"
                              class="w-[48] h-[48] rounded-full bg-purple-500 items-center justify-center">
                <icon name="star" :size="24" color="#FFFFFF"/>
            </pressable>
            <pressable @press="increment"
                              class="w-[48] h-[48] rounded-full bg-amber-500 items-center justify-center">
                <icon name="favorite" :size="24" color="#FFFFFF"/>
            </pressable>
        </row>

        <divider class="my-2"/>

        {{-- Counter --}}
        <text class="text-lg font-semibold text-theme-on-background">Interactive Counter</text>
        <row class="w-full gap-4 items-center justify-center">
            <button variant="destructive" size="lg" icon="minus.circle.fill" a11y-label="Decrement"
                           @press="decrement"/>
            <column class="w-[80] h-[80] rounded-2xl bg-indigo-600 items-center justify-center">
                <text class="text-white font-extrabold text-3xl">{{ $count }}</text>
            </column>
            <button variant="primary" size="lg" icon="add" a11y-label="Increment" @press="increment"/>
        </row>

    </column>
</scroll-view>
