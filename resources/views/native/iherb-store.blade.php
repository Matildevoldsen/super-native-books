<scroll-view class="w-full h-full bg-gray-50">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <column class="w-full bg-[#507D2A] px-4 pt-3 pb-3">
            <row class="w-full items-center justify-between">
                <text class="text-[22] font-bold text-white">iHerb</text>
                <column @press="viewCart" class="w-[36] h-[36] rounded-full bg-white/20 items-center justify-center">
                    <icon name="shopping_cart" :size="20" color="#FFFFFF" />
                </column>
            </row>
        </column>

        {{-- Search Bar --}}
        <column class="w-full bg-[#F5B81C] px-4 py-3">
            <row class="w-full bg-white rounded-lg px-3 py-2 items-center gap-2">
                <icon name="search" :size="20" color="#999999" />
                <text class="text-[14] text-[#999999]">Search all of iHerb</text>
            </row>
        </column>

        {{-- Promo Banner --}}
        <column class="w-full bg-[#C62828] px-5 py-5">
            <text class="text-[22] font-bold text-white">Probiotics</text>
            <text class="text-[22] font-bold text-white">for Every Body</text>
            <spacer class="h-[4]" />
            <text class="text-[14] text-white/80">Trusted formulas, guaranteed quality</text>
            <spacer class="h-[8]" />
            <button label="Shop Now" color="#FFFFFF" labelColor="#C62828" :fontSize="13" />
        </column>

        {{-- Shop by Category --}}
        <column class="w-full bg-white px-4 pt-4 pb-2">
            <text class="text-[18] font-bold text-[#333333]">Shop by category</text>
        </column>
        <scroll-view horizontal class="bg-white">
            <row class="gap-4 px-4 pb-4">
                @foreach ($categories as $catIndex => $cat)
                    <column @press="viewCategory({{ $catIndex }})" class="items-center gap-2 w-[72]">
                        <column class="w-[56] h-[56] rounded-full bg-[#E8F5E9] items-center justify-center">
                            <icon name="{{ $cat['icon'] }}" :size="26" color="#507D2A" />
                        </column>
                        <text class="text-[11] text-[#333333] text-center">{{ $cat['name'] }}</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        {{-- Health Topics --}}
        <scroll-view horizontal class="bg-white">
            <row class="gap-2 px-4 pb-3">
                @foreach ($healthTopics as $topic)
                    <chip label="{{ $topic }}" />
                @endforeach
            </row>
        </scroll-view>

        <divider class="w-full" />

        {{-- Trending Now --}}
        <column class="w-full bg-white px-4 pt-4 pb-2">
            <text class="text-[18] font-bold text-[#333333]">Trending now</text>
        </column>
        <scroll-view horizontal class="bg-white">
            <row class="gap-3 px-4 pb-4">
                @foreach ($trending as $product)
                    <column @press="viewProduct({{ $product['originalIndex'] }})" class="w-[160] gap-2">
                        <column class="w-[160] h-[160] bg-gray-100 rounded-lg items-center justify-center">
                            @if ($product['badge'])
                                <badge
                                    :count="0"
                                    color="{{ $product['badge'] === 'Best seller' ? '#CC0000' : '#507D2A' }}"
                                />
                            @endif
                            <image
                                src="{{ $product['imageUrl'] }}"
                                class="w-[140] h-[140] rounded-lg"
                                :fit="2"
                            />
                        </column>
                        <text class="text-[12] text-[#333333]" :maxLines="2">{{ $product['brand'] }}, {{ $product['name'] }}</text>
                        <row class="items-center gap-1">
                            <icon name="star" :size="12" color="#DAA520" />
                            <text class="text-[11] text-[#DAA520]">{{ $product['rating'] }}</text>
                            <text class="text-[11] text-[#999999]">{{ $product['reviewFormatted'] }}</text>
                        </row>
                        <row class="items-center gap-2">
                            <text class="text-[14] font-bold text-[#333333]">{{ $product['priceFormatted'] }}</text>
                            @if ($product['originalPriceFormatted'])
                                <text class="text-[12] text-[#999999] line-through">{{ $product['originalPriceFormatted'] }}</text>
                            @endif
                        </row>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        <divider class="w-full" />

        {{-- Best Sellers --}}
        <column class="w-full bg-white px-4 pt-4 pb-2">
            <text class="text-[18] font-bold text-[#333333]">Best sellers</text>
        </column>
        <scroll-view horizontal class="bg-white">
            <row class="gap-2 px-4 pb-3">
                @foreach (['Supplements', 'Sports', 'Bath & Care', 'Beauty', 'Grocery'] as $cat)
                    <chip
                        label="{{ $cat }}"
                        :selected="$selectedBestSellerCategory === $cat"
                        color="#507D2A"
                        @change="selectBestSellerCategory({{ $cat }})"
                    />
                @endforeach
            </row>
        </scroll-view>

        {{-- Best Seller Product List --}}
        <column class="w-full bg-white px-4 pb-4 gap-3">
            @foreach ($bestSellers as $product)
                <column @press="viewProduct({{ $product['originalIndex'] }})" class="w-full">
                    <row class="w-full gap-3">
                        <column class="w-[100] h-[100] bg-gray-100 rounded-lg items-center justify-center">
                            <image
                                src="{{ $product['imageUrl'] }}"
                                class="w-[90] h-[90] rounded-lg"
                                :fit="2"
                            />
                        </column>
                        <column class="w-[240] gap-1">
                            @if ($product['badge'])
                                <text class="text-[10] font-bold text-{{ $product['badge'] === 'Best seller' ? '[#CC0000]' : '[#507D2A]' }}">{{ $product['badge'] }}</text>
                            @endif
                            <text class="text-[13] text-[#333333]" :maxLines="2">{{ $product['brand'] }}, {{ $product['name'] }}</text>
                            <row class="items-center gap-1">
                                <icon name="star" :size="12" color="#DAA520" />
                                <text class="text-[11] text-[#333333]">{{ $product['rating'] }}</text>
                                <text class="text-[11] text-[#999999]">{{ $product['reviewFormatted'] }}</text>
                            </row>
                            <text class="text-[11] text-[#999999]">{{ $product['soldIn30Days'] }} sold in 30 days</text>
                            <row class="items-center gap-2">
                                <text class="text-[15] font-bold text-[#333333]">{{ $product['priceFormatted'] }}</text>
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

        {{-- Free Shipping Banner --}}
        <column class="w-full bg-[#E8F5E9] px-4 py-4 items-center">
            <row class="items-center gap-2">
                <icon name="local_shipping" :size="20" color="#507D2A" />
                <text class="text-[14] font-semibold text-[#507D2A]">Free Shipping over $30</text>
            </row>
        </column>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
