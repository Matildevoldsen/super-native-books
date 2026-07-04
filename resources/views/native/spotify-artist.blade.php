<scroll-view class="w-full h-full bg-[#121212] safe-area">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <row class="w-full px-4 py-3 items-center gap-3">
            <column @press="back" class="w-[32] h-[32] items-center justify-center">
                <icon name="arrow_back" :size="24" color="#FFFFFF" />
            </column>
        </row>

        {{-- Artist Image --}}
        <image
            src="{{ $artist['imageUrl'] }}"
            class="w-full h-[280]"
            :fit="2"
        />

        {{-- Artist Info --}}
        <column class="w-full px-4 pt-4 gap-1">
            <text class="text-[28] font-bold text-white">{{ $artist['name'] }}</text>
            <text class="text-[13] text-[#B3B3B3]">{{ $listenersFormatted }} monthly listeners</text>
        </column>

        {{-- Action Row --}}
        <row class="w-full px-4 py-3 items-center gap-4">
            <column @press="toggleFollow" class="px-4 py-1 rounded-full {{ $isFollowing ? 'bg-[#1DB954]' : 'bg-transparent' }}" style="border: 1px solid {{ $isFollowing ? '#1DB954' : '#B3B3B3' }}">
                <text class="text-[13] font-bold text-{{ $isFollowing ? 'black' : 'white' }}">{{ $isFollowing ? 'Following' : 'Follow' }}</text>
            </column>
            <icon name="more_horiz" :size="24" color="#B3B3B3" />
            <spacer />
            <icon name="shuffle" :size="24" color="#1DB954" />
            <column @press="playTrack(0)" class="w-[48] h-[48] rounded-full bg-[#1DB954] items-center justify-center">
                <icon name="play_arrow" :size="28" color="#000000" />
            </column>
        </row>

        {{-- Popular Tracks --}}
        <column class="w-full px-4 pt-2 pb-2">
            <text class="text-[16] font-bold text-white">Popular</text>
        </column>

        <column class="w-full px-4 gap-0">
            @foreach ($tracksWithMeta as $trackIndex => $track)
                <row @press="playTrack({{ $trackIndex }})" class="w-full py-3 items-center gap-3">
                    <column class="w-[24] items-center">
                        <text class="text-[14] text-[#B3B3B3]">{{ $trackIndex + 1 }}</text>
                    </column>
                    <column class="w-[240] gap-1">
                        <text class="text-[15] text-white" :maxLines="1">{{ $track['title'] }}</text>
                        <text class="text-[12] text-[#B3B3B3]">{{ $track['playsFormatted'] }} plays</text>
                    </column>
                    <spacer />
                    <text class="text-[13] text-[#B3B3B3]">{{ $track['duration'] }}</text>
                    <icon name="more_vert" :size="18" color="#B3B3B3" />
                </row>
            @endforeach
        </column>

        <divider class="w-full mx-4 my-3" />

        {{-- About --}}
        <column class="w-full px-4 gap-2 pb-4">
            <text class="text-[16] font-bold text-white">About</text>
            <text class="text-[14] text-[#B3B3B3]">{{ $artist['bio'] }}</text>
            <row class="items-center gap-2 pt-1">
                <text class="text-[13] text-white font-bold">{{ $followersFormatted }}</text>
                <text class="text-[13] text-[#B3B3B3]">followers</text>
                <text class="text-[13] text-[#B3B3B3]">·</text>
                <text class="text-[13] text-[#B3B3B3]">{{ $artist['genre'] }}</text>
            </row>
        </column>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
