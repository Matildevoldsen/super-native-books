<scroll-view class="w-full h-full bg-white">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <column class="w-full bg-[#507D2A]">
            <row class="w-full px-4 py-3 items-center gap-3">
                <column @press="back" class="w-[32] h-[32] rounded-full bg-white/20 items-center justify-center">
                    <icon name="arrow_back" :size="20" color="#FFFFFF" />
                </column>
                <text class="text-[18] font-bold text-white">{{ $category['name'] }}</text>
            </row>
        </column>

        {{-- Search Bar --}}
        <column class="w-full bg-[#F5B81C] px-4 py-3">
            <row class="w-full bg-white rounded-lg px-3 py-2 items-center gap-2">
                <icon name="search" :size="20" color="#999999" />
                <text class="text-[14] text-[#999999]">Search in {{ $category['name'] }}</text>
            </row>
        </column>

        {{-- Result Count --}}
        <column class="w-full px-4 py-2 bg-gray-50">
            <text class="text-[13] text-[#666666]">{{ number_format($category['productCount']) }} results</text>
        </column>

        {{-- Subcategory Chips --}}
        <scroll-view horizontal class="bg-white">
            <row class="gap-2 px-4 py-3">
                @foreach ($subcategories as $sub)
                    <chip label="{{ $sub['name'] }}" />
                @endforeach
            </row>
        </scroll-view>

        <divider class="w-full" />

        {{-- Product List --}}
        <column class="w-full px-4 pt-3 pb-4 gap-4">
            @foreach ($productsWithMeta as $product)
                <column @press="viewProduct({{ $product['originalIndex'] }})" class="w-full">
                    <row class="w-full gap-3">
                        {{-- Product Image --}}
                        <column class="w-[110] h-[110] bg-gray-100 rounded-lg items-center justify-center">
                            <image
                                src="{{ $product['imageUrl'] }}"
                                class="w-[100] h-[100] rounded-lg"
                                :fit="2"
                            />
                        </column>

                        {{-- Product Info --}}
                        <column class="w-[230] gap-1">
                            @if ($product['badge'])
                                <row class="items-center">
                                    <text class="text-[10] font-bold text-white bg-{{ $product['badge'] === 'Best seller' ? '[#CC0000]' : '[#507D2A]' }} px-2 py-0.5 rounded">{{ $product['badge'] }}</text>
                                </row>
                            @endif

                            <text class="text-[13] text-[#333333]" :maxLines="2">{{ $product['brand'] }}, {{ $product['name'] }}</text>

                            <row class="items-center gap-1">
                                <icon name="star" :size="12" color="#DAA520" />
                                <icon name="star" :size="12" color="#DAA520" />
                                <icon name="star" :size="12" color="#DAA520" />
                                <icon name="star" :size="12" color="#DAA520" />
                                <icon name="star_half" :size="12" color="#DAA520" />
                                <text class="text-[11] text-[#999999]">{{ $product['reviewFormatted'] }}</text>
                            </row>

                            <text class="text-[11] text-[#666666]">{{ $product['soldIn30Days'] }} sold in 30 days</text>

                            <row class="items-center gap-2">
                                <text class="text-[16] font-bold text-[#333333]">{{ $product['priceFormatted'] }}</text>
                                @if ($product['originalPriceFormatted'])
                                    <text class="text-[12] text-[#999999] line-through">{{ $product['originalPriceFormatted'] }}</text>
                                @endif
                            </row>
                        </column>
                    </row>
                    <divider class="w-full mt-3" />
                </column>
            @endforeach
        </column>

        @if (count($productsWithMeta) === 0)
            <column class="w-full items-center py-8">
                <icon name="inventory_2" :size="48" color="#CCCCCC" />
                <spacer class="h-[8]" />
                <text class="text-[15] text-[#999999]">No products found</text>
            </column>
        @endif

        <spacer class="h-[20]" />

    </column>
</scroll-view>
