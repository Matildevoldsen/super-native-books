{{-- @include('native.partials.demo-nav', ['title' => 'Spotify']) --}}

<scroll-view class="w-full h-full bg-[#121212]">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <row class="w-full px-4 pt-4 pb-2 items-center justify-between">
            <text class="text-[22] font-bold text-white">Good evening</text>
            <row class="items-center gap-4">
                <icon name="notifications_none" :size="24" color="#FFFFFF" />
                <icon name="history" :size="24" color="#FFFFFF" />
                <column @press="viewSearch" class="w-[32] h-[32] items-center justify-center">
                    <icon name="settings" :size="22" color="#FFFFFF" />
                </column>
            </row>
        </row>

        {{-- Recently Played Grid --}}
        <column class="w-full px-4 pt-2 gap-2">
            @foreach (array_chunk($recentlyPlayed, 2) as $row)
                <row class="w-full gap-2">
                    @foreach ($row as $index => $playlist)
                        <row @press="viewPlaylist({{ array_search($playlist, $recentlyPlayed) }})" class="w-[170] h-[56] bg-[#282828] rounded items-center gap-0">
                            <image
                                src="{{ $playlist['coverUrl'] }}"
                                class="w-[56] h-[56] rounded-l"
                                :fit="2"
                            />
                            <text class="text-[12] font-bold text-white px-2" :maxLines="2">{{ $playlist['name'] }}</text>
                        </row>
                    @endforeach
                </row>
            @endforeach
        </column>

        {{-- Made For You --}}
        <column class="w-full px-4 pt-6 pb-2">
            <text class="text-[20] font-bold text-white">Made For You</text>
        </column>
        <scroll-view horizontal>
            <row class="gap-3 px-4 pb-4">
                @foreach ($madeForYou as $index => $playlist)
                    <column @press="viewPlaylist({{ $index + 2 }})" class="w-[150] gap-2">
                        <image
                            src="{{ $playlist['coverUrl'] }}"
                            class="w-[150] h-[150] rounded"
                            :fit="2"
                        />
                        <text class="text-[12] text-[#B3B3B3]" :maxLines="2">{{ $playlist['description'] }}</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        {{-- Popular Artists --}}
        <column class="w-full px-4 pt-4 pb-2">
            <text class="text-[20] font-bold text-white">Popular artists</text>
        </column>
        <scroll-view horizontal>
            <row class="gap-4 px-4 pb-4">
                @foreach ($artists as $artistIndex => $artist)
                    <column @press="viewArtist({{ $artistIndex }})" class="items-center gap-2 w-[120]">
                        <image
                            src="{{ $artist['imageUrl'] }}"
                            class="w-[120] h-[120] rounded-full"
                            :fit="2"
                        />
                        <text class="text-[13] font-bold text-white text-center">{{ $artist['name'] }}</text>
                        <text class="text-[11] text-[#B3B3B3]">Artist</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        {{-- Your Top Mixes --}}
        <column class="w-full px-4 pt-4 pb-2">
            <text class="text-[20] font-bold text-white">Your top mixes</text>
        </column>
        <scroll-view horizontal>
            <row class="gap-3 px-4 pb-4">
                @foreach (array_slice($recentlyPlayed, 0, 4) as $pIndex => $playlist)
                    <column @press="viewPlaylist({{ $pIndex }})" class="w-[150] gap-2">
                        <image
                            src="{{ $playlist['coverUrl'] }}"
                            class="w-[150] h-[150] rounded"
                            :fit="2"
                        />
                        <text class="text-[13] font-bold text-white" :maxLines="1">{{ $playlist['name'] }}</text>
                        <text class="text-[11] text-[#B3B3B3]">{{ $playlist['creator'] }}</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
