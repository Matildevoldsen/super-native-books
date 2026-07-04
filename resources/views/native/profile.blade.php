<column class="flex-1 w-full p-5 gap-4 items-center">
    <column class="w-[88] h-[88] rounded-full bg-purple-500 items-center justify-center mt-6">
        <text class="text-white text-3xl font-bold">SR</text>
    </column>

    <text class="text-2xl font-bold">{{ $name }}</text>
    <text class="text-sm text-gray-500">{{ $email }}</text>

    <row class="gap-8 mt-4">
        <column class="items-center">
            <text class="text-xl font-bold">{{ $followers }}</text>
            <text class="text-xs text-gray-500">Followers</text>
        </column>
        <column class="items-center">
            <text class="text-xl font-bold">{{ $following }}</text>
            <text class="text-xs text-gray-500">Following</text>
        </column>
    </row>
</column>
