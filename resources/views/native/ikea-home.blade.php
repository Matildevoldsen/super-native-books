

<scroll-view class="w-full h-full bg-gray-50">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <column class="w-full bg-[#003399] px-4 pt-3 pb-3">
            <row class="w-full items-center justify-between">
                <text class="text-[22] font-bold text-[#FFCC00]">IKEA</text>
                <row class="items-center gap-3">
                    <column @press="viewSearch" class="w-[36] h-[36] rounded-full bg-white/20 items-center justify-center">
                        <icon name="search" :size="20" color="#FFFFFF" />
                    </column>
                    <column @press="viewCart" class="w-[36] h-[36] rounded-full bg-white/20 items-center justify-center">
                        <icon name="cart" :size="20" color="#FFFFFF" />
                    </column>
                </row>
            </row>
        </column>

        {{-- Hero Banner --}}
        <column class="w-full bg-[#003399] px-5 pb-5">
            <text class="text-[24] font-bold text-white">Create your dream home</text>
            <spacer class="h-[4]" />
            <text class="text-[14] text-white">Affordable solutions for every room</text>
            <spacer class="h-[12]" />
            <button label="Explore rooms" color="#FFCC00" labelColor="#003399" :fontSize="13" />
        </column>

        {{-- Shop by Room --}}
        <column class="w-full bg-white px-4 pt-4 pb-2">
            <text class="text-[18] font-bold text-[#111111]">Shop by room</text>
        </column>
        <scroll-view horizontal class="bg-white">
            <row class="gap-4 px-4 pb-4">
                @foreach ($categories as $catIndex => $cat)
                    <column @press="selectCategory('{{ $cat['name'] }}')" class="items-center gap-2 w-[72]">
                        <column class="w-[56] h-[56] rounded-full bg-[#F5F5F5] items-center justify-center">
                            <icon name="{{ $cat['icon'] }}" :size="26" color="#003399" />
                        </column>
                        <text class="text-[11] text-[#111111]">{{ $cat['name'] }}</text>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        {{-- Room Ideas --}}
        <scroll-view horizontal class="bg-white">
            <row class="gap-2 px-4 pb-3">
                @foreach ($roomIdeas as $idea)
                    <chip label="{{ $idea }}" />
                @endforeach
            </row>
        </scroll-view>

        <divider class="w-full" />

        {{-- Popular Products --}}
        <column class="w-full bg-white px-4 pt-4 pb-2">
            <text class="text-[18] font-bold text-[#111111]">Popular right now</text>
        </column>
        <scroll-view horizontal class="bg-white">
            <row class="gap-3 px-4 pb-4">
                @foreach ($popular as $product)
                    <column @press="viewProduct({{ $product['originalIndex'] }})" class="w-[160] gap-2">
                        <column class="w-[160] h-[160] bg-[#F5F5F5] rounded-lg items-center justify-center">
                            <image
                                src="{{ $product['imageUrl'] }}"
                                class="w-[140] h-[140] rounded-lg"
                                :fit="2"
                            />
                        </column>
                        <text class="text-[12] font-bold text-[#111111]">{{ $product['seriesName'] }}</text>
                        <text class="text-[11] text-[#484848]" :maxLines="1">{{ $product['name'] }}</text>
                        <row class="items-center gap-2">
                            <text class="text-[14] font-bold text-[#111111]">{{ $product['priceFormatted'] }}</text>
                            @if ($product['originalPriceFormatted'])
                                <text class="text-[12] text-[#999999] line-through">{{ $product['originalPriceFormatted'] }}</text>
                            @endif
                        </row>
                        <row class="items-center gap-1">
                            <icon name="star" :size="12" color="#111111" />
                            <text class="text-[11] text-[#484848]">{{ $product['rating'] }} ({{ $product['reviewFormatted'] }})</text>
                        </row>
                    </column>
                @endforeach
            </row>
        </scroll-view>

        <divider class="w-full" />

        {{-- Category Filter --}}
        <column class="w-full bg-white px-4 pt-4 pb-2">
            <text class="text-[18] font-bold text-[#111111]">{{ $selectedCategory }}</text>
        </column>
        <scroll-view horizontal class="bg-white">
            <row class="gap-2 px-4 pb-3">
                @foreach ($categories as $cat)
                    <chip
                        label="{{ $cat['name'] }}"
                        :selected="$selectedCategory === $cat['name']"
                        @change="selectCategory('{{ $cat['name'] }}')"
                    />
                @endforeach
            </row>
        </scroll-view>

        {{-- Category Products --}}
        <column class="w-full bg-white px-4 pb-4 gap-3">
            @foreach ($categoryProducts as $product)
                <column @press="viewProduct({{ $product['originalIndex'] }})" class="w-full">
                    <row class="w-full gap-3">
                        <column class="w-[110] h-[110] bg-[#F5F5F5] rounded-lg items-center justify-center">
                            <image
                                src="{{ $product['imageUrl'] }}"
                                class="w-[100] h-[100] rounded-lg"
                                :fit="2"
                            />
                        </column>
                        <column class="w-[230] gap-1">
                            @if ($product['badge'])
                                <text class="text-[10] font-bold text-[#CC0000]">{{ $product['badge'] }}</text>
                            @endif
                            <text class="text-[14] font-bold text-[#111111]">{{ $product['seriesName'] }}</text>
                            <text class="text-[12] text-[#484848]" :maxLines="1">{{ $product['name'] }}</text>
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
                            <text class="text-[11] text-[#484848]">{{ $product['color'] }}</text>
                        </column>
                    </row>
                    <divider class="w-full mt-3" />
                </column>
            @endforeach
        </column>

        @if (count($categoryProducts) === 0)
            <column class="w-full bg-white items-center py-8">
                <icon name="search" :size="48" color="#CCCCCC" />
                <spacer class="h-[8]" />
                <text class="text-[15] text-[#999999]">No products in this category</text>
            </column>
        @endif

        {{-- Delivery Banner --}}
        <column class="w-full bg-[#003399] px-4 py-4 items-center gap-2">
            <row class="items-center gap-2">
                <icon name="local_shipping" :size="20" color="#FFCC00" />
                <text class="text-[14] font-semibold text-white">Free delivery on orders over $500</text>
            </row>
            <text class="text-[12] text-white">Click and collect available at all stores</text>
        </column>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
