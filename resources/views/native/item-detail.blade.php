<column class="flex-1 w-full p-5 gap-4">
    <column class="w-full h-[160] rounded-xl bg-blue-500 items-center justify-center">
        <text class="text-white text-5xl font-bold">#{{ $id }}</text>
    </column>

    <text class="text-2xl font-bold">{{ $title }}</text>
    <text class="text-sm text-gray-500">
        This is a pushed detail screen. Tap the back arrow in the top bar,
        or swipe from the left edge to pop.
    </text>

    <divider />

    <button label="Go back" @press="back" class="bg-gray-200 rounded-lg px-5 py-3 mt-2" />
</column>
