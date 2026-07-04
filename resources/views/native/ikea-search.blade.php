<column class="w-full h-full bg-gray-50 safe-area">

    {{-- Top Bar --}}
    <column class="w-full bg-[#003399]">
        <row class="w-full px-4 py-3 items-center gap-3">
            <column @press="back" class="w-[32] h-[32] rounded-full bg-white/20 items-center justify-center">
                <icon name="arrow_back" :size="20" color="#FFFFFF" />
            </column>
            <text class="text-[18] font-bold text-white">Search</text>
        </row>
    </column>

    {{-- Search Input --}}
    <column class="w-full bg-white px-4 py-3">
        <outlined-text-input
            value="{{ $searchQuery }}"
            placeholder="What are you looking for?"
            @change="updateSearch"
            :variant="0"
            class="w-full"
        />
    </column>

    {{-- Room Filter Chips --}}
    <scroll-view horizontal class="bg-white">
        <row class="gap-2 px-4 pb-3">
            @foreach ($categories as $cat)
                <chip
                    label="{{ $cat['name'] }}"
                    icon="{{ $cat['icon'] }}"
                    :selected="$selectedRoom === $cat['name']"
                    @change="selectRoom('{{ $cat['name'] }}')"
                />
            @endforeach
        </row>
    </scroll-view>

    <divider class="w-full" />

    {{-- Result Count --}}
    <column class="w-full px-4 py-2 bg-gray-50">
        <text class="text-[13] text-[#484848]">{{ $resultCount }} {{ $resultCount === 1 ? 'result' : 'results' }}</text>
    </column>

    {{-- Product Results --}}
    <scroll-view class="w-full h-full">
        <column class="w-full px-4 pt-2 pb-4 gap-3">
            @foreach ($results as $product)
                <column @press="viewProduct({{ $product['originalIndex'] }})" class="w-full bg-white rounded-lg">
                    <row class="w-full gap-3 p-3">
                        {{-- Product Image --}}
                        <column class="w-[100] h-[100] bg-[#F5F5F5] rounded-lg items-center justify-center">
                            <image
                                src="{{ $product['imageUrl'] }}"
                                class="w-[90] h-[90] rounded-lg"
                                :fit="2"
                            />
                        </column>

                        {{-- Product Info --}}
                        <column class="w-[230] gap-1">
                            @if ($product['badge'])
                                <text class="text-[10] font-bold text-[#CC0000]">{{ $product['badge'] }}</text>
                            @endif
                            <text class="text-[14] font-bold text-[#111111]">{{ $product['seriesName'] }}</text>
                            <text class="text-[12] text-[#484848]" :maxLines="1">{{ $product['name'] }}</text>
                            <text class="text-[11] text-[#484848]">{{ $product['color'] }}</text>
                            <row class="items-center gap-2">
                                <text class="text-[16] font-bold text-[#111111]">{{ $product['priceFormatted'] }}</text>
                                @if ($product['originalPriceFormatted'])
                                    <text class="text-[12] text-[#999999] line-through">{{ $product['originalPriceFormatted'] }}</text>
                                @endif
                            </row>
                            <row class="items-center gap-1">
                                <icon name="star" :size="12" color="#111111" />
                                <text class="text-[11] text-[#484848]">{{ $product['rating'] }} ({{ $product['reviewFormatted'] }})</text>
                            </row>
                        </column>
                    </row>
                </column>
            @endforeach
        </column>

        @if (count($results) === 0)
            <column class="w-full items-center py-8">
                <icon name="search_off" :size="48" color="#CCCCCC" />
                <spacer class="h-[8]" />
                <text class="text-[15] text-[#999999]">No products found</text>
                <text class="text-[12] text-[#999999]">Try a different search or room filter</text>
            </column>
        @endif
    </scroll-view>

</column>
