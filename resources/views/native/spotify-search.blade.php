<scroll-view class="w-full h-full bg-[#121212] safe-area">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <row class="w-full px-4 pt-4 pb-2 items-center">
            <row class="items-center gap-3">
                <column @press="back" class="w-[32] h-[32] items-center justify-center">
                    <icon name="arrow_back" :size="24" color="#FFFFFF" />
                </column>
                <text class="text-[22] font-bold text-white">Search</text>
            </row>
        </row>

        {{-- Search Bar --}}
        <column class="w-full px-4 pt-2 pb-4">
            <row class="w-full bg-white rounded-lg px-3 py-3 items-center gap-2">
                <icon name="search" :size="22" color="#121212" />
                <text class="text-[15] text-[#121212] font-semibold">What do you want to listen to?</text>
            </row>
        </column>

        {{-- Top Genres --}}
        <column class="w-full px-4 pb-2">
            <text class="text-[16] font-bold text-white">Browse all</text>
        </column>

        <column class="w-full px-4 gap-2 pb-4">
            @foreach (array_chunk(array_keys($genres), 2) as $row)
                <row class="w-full gap-2">
                    @foreach ($row as $genreName)
                        <column class="w-[170] h-[90] rounded-lg px-3 pt-3 bg-[{{ $genres[$genreName] }}]">
                            <text class="text-[16] font-bold text-white">{{ $genreName }}</text>
                        </column>
                    @endforeach
                </row>
            @endforeach
        </column>

        {{-- Top Results / Popular --}}
        <column class="w-full px-4 pt-2 pb-2">
            <text class="text-[16] font-bold text-white">Popular playlists</text>
        </column>

        <scroll-view horizontal>
            <row class="gap-3 px-4 pb-4">
                @foreach (array_slice($playlists, 0, 4) as $pIndex => $playlist)
                    <column @press="viewPlaylist({{ $pIndex }})" class="w-[140] gap-2">
                        <image
                            src="{{ $playlist['coverUrl'] }}"
                            class="w-[140] h-[140] rounded"
                            :fit="2"
                        />
                        <text class="text-[12] text-[#B3B3B3]" :maxLines="2">{{ $playlist['name'] }}</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        {{-- Popular Artists --}}
        <column class="w-full px-4 pt-2 pb-2">
            <text class="text-[16] font-bold text-white">Popular artists</text>
        </column>

        <column class="w-full px-4 gap-0 pb-4">
            @foreach (array_slice($artists, 0, 4) as $aIndex => $artist)
                <row @press="viewArtist({{ $aIndex }})" class="w-full py-2 items-center gap-3">
                    <image
                        src="{{ $artist['imageUrl'] }}"
                        class="w-[48] h-[48] rounded-full"
                        :fit="2"
                    />
                    <column>
                        <text class="text-[14] text-white font-semibold">{{ $artist['name'] }}</text>
                        <text class="text-[12] text-[#B3B3B3]">Artist · {{ $artist['genre'] }}</text>
                    </column>
                </row>
            @endforeach
        </column>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
