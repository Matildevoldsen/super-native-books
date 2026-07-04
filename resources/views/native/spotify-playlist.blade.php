<scroll-view class="w-full h-full bg-[#121212] safe-area">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <row class="w-full px-4 py-3 items-center gap-3">
            <column @press="back" class="w-[32] h-[32] items-center justify-center">
                <icon name="arrow_back" :size="24" color="#FFFFFF" />
            </column>
        </row>

        {{-- Cover Art --}}
        <column class="w-full items-center py-4">
            <image
                src="{{ $playlist['coverUrl'] }}"
                class="w-[200] h-[200] rounded shadow-lg"
                :fit="2"
            />
        </column>

        {{-- Playlist Info --}}
        <column class="w-full px-4 gap-1">
            <text class="text-[22] font-bold text-white">{{ $playlist['name'] }}</text>
            <text class="text-[13] text-[#B3B3B3]">{{ $playlist['description'] }}</text>
            <row class="items-center gap-1 pt-1">
                <icon name="person" :size="14" color="#1DB954" />
                <text class="text-[12] text-[#B3B3B3]">{{ $playlist['creator'] }}</text>
                <text class="text-[12] text-[#B3B3B3]">· {{ $playlist['trackCount'] }} songs</text>
            </row>
        </column>

        {{-- Action Row --}}
        <row class="w-full px-4 py-3 items-center justify-between">
            <row class="items-center gap-4">
                <icon name="favorite_border" :size="24" color="#B3B3B3" />
                <icon name="download" :size="24" color="#B3B3B3" />
                <icon name="more_horiz" :size="24" color="#B3B3B3" />
            </row>
            <row class="items-center gap-3">
                <icon name="shuffle" :size="24" color="#1DB954" />
                <column @press="shufflePlay" class="w-[48] h-[48] rounded-full bg-[#1DB954] items-center justify-center">
                    <icon name="play_arrow" :size="28" color="#000000" />
                </column>
            </row>
        </row>

        {{-- Track List --}}
        <column class="w-full px-4 gap-0">
            @foreach ($tracksWithMeta as $trackIndex => $track)
                <row @press="playTrack({{ $trackIndex }})" class="w-full py-3 items-center gap-3">
                    <column class="w-[24] items-center">
                        <text class="text-[14] text-[#B3B3B3]">{{ $trackIndex + 1 }}</text>
                    </column>
                    <column class="w-[250] gap-1">
                        <text class="text-[15] text-white" :maxLines="1">{{ $track['title'] }}</text>
                        <text class="text-[12] text-[#B3B3B3]">{{ $track['artistName'] }} · {{ $track['playsFormatted'] }} plays</text>
                    </column>
                    <spacer />
                    <text class="text-[13] text-[#B3B3B3]">{{ $track['duration'] }}</text>
                    <icon name="more_vert" :size="18" color="#B3B3B3" />
                </row>
            @endforeach
        </column>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
