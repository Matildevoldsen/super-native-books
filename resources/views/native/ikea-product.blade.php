<scroll-view class="w-full h-full bg-white">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <column class="w-full bg-[#003399]">
            <row class="w-full px-4 py-3 items-center justify-between">
                <column @press="back" class="w-[32] h-[32] rounded-full bg-white/20 items-center justify-center">
                    <icon name="arrow_back" :size="20" color="#FFFFFF" />
                </column>
                <row class="items-center gap-3">
                    <column @press="toggleFavorite">
                        <icon
                            name="{{ $isFavorited ? 'favorite' : 'favorite_border' }}"
                            :size="22"
                            color="{{ $isFavorited ? '#CC0000' : '#FFFFFF' }}"
                        />
                    </column>
                    <icon name="share" :size="22" color="#FFFFFF" />
                </row>
            </row>
        </column>

        {{-- Product Image --}}
        <column class="w-full items-center bg-[#F5F5F5] py-6">
            <image
                src="{{ $product['imageUrl'] }}"
                class="w-[280] h-[280]"
                :fit="1"
            />
        </column>

        {{-- Badge --}}
        @if ($product['badge'])
            <column class="w-full bg-[#CC0000] px-4 py-2">
                <text class="text-[12] font-bold text-white">{{ $product['badge'] }}</text>
            </column>
        @endif

        {{-- Product Info --}}
        <column class="w-full px-4 pt-4 gap-1">
            {{-- Series Name --}}
            <text class="text-[22] font-bold text-[#111111]">{{ $product['seriesName'] }}</text>

            {{-- Product Name --}}
            <text class="text-[14] text-[#484848]">{{ $product['name'] }}, {{ $product['color'] }}</text>

            {{-- Price --}}
            <row class="items-center gap-3 pt-2">
                <text class="text-[28] font-bold text-[#111111]">{{ $priceFormatted }}</text>
                @if ($originalPriceFormatted)
                    <text class="text-[16] text-[#999999] line-through">{{ $originalPriceFormatted }}</text>
                @endif
            </row>

            {{-- Rating --}}
            <row class="items-center gap-2 pt-1">
                <row class="items-center gap-0">
                    <icon name="star" :size="16" color="#111111" />
                    <icon name="star" :size="16" color="#111111" />
                    <icon name="star" :size="16" color="#111111" />
                    <icon name="star" :size="16" color="#111111" />
                    <icon name="star_half" :size="16" color="#111111" />
                </row>
                <text class="text-[13] text-[#484848]">{{ $product['rating'] }} ({{ $reviewFormatted }})</text>
            </row>
        </column>

        <divider class="w-full mx-4 my-3" />

        {{-- Availability --}}
        <column class="w-full px-4 gap-2">
            <row class="items-center gap-2">
                @if ($product['inStock'])
                    <icon name="check_circle" :size="18" color="#0A8A00" />
                    <text class="text-[14] text-[#0A8A00] font-semibold">In stock</text>
                @else
                    <icon name="cancel" :size="18" color="#CC0000" />
                    <text class="text-[14] text-[#CC0000] font-semibold">Out of stock</text>
                @endif
            </row>
            <row class="items-center gap-2">
                <icon name="local_shipping" :size="16" color="#484848" />
                <text class="text-[13] text-[#484848]">Delivery available</text>
            </row>
            <row class="items-center gap-2">
                <icon name="store" :size="16" color="#484848" />
                <text class="text-[13] text-[#484848]">Check store availability</text>
            </row>
        </column>

        <divider class="w-full mx-4 my-3" />

        {{-- Product Details --}}
        <column class="w-full px-4 gap-2">
            <text class="text-[16] font-bold text-[#111111]">Product details</text>
            <text class="text-[14] text-[#484848]">{{ $product['description'] }}</text>

            <spacer class="h-[4]" />

            <row class="items-center gap-2">
                <icon name="straighten" :size="16" color="#484848" />
                <text class="text-[13] text-[#484848]">{{ $product['dimensions'] }}</text>
            </row>
            <row class="items-center gap-2">
                <icon name="texture" :size="16" color="#484848" />
                <text class="text-[13] text-[#484848]">{{ $product['material'] }}</text>
            </row>
            <row class="items-center gap-2">
                <icon name="palette" :size="16" color="#484848" />
                <text class="text-[13] text-[#484848]">{{ $product['color'] }}</text>
            </row>
            <row class="items-center gap-2">
                <icon name="tag" :size="16" color="#484848" />
                <text class="text-[13] text-[#484848]">Article no. {{ $product['articleNumber'] }}</text>
            </row>
        </column>

        <divider class="w-full mx-4 my-4" />

        {{-- Quantity & Add to Bag --}}
        <column class="w-full items-center px-4 pb-4 gap-3">
            {{-- Quantity Selector --}}
            <row class="items-center gap-4 w-full">
                <column @press="decrementQty" class="w-[40] h-[40] rounded-full bg-[#F5F5F5] items-center justify-center">
                    <icon name="remove" :size="20" color="#111111" />
                </column>
                <text class="text-[18] font-bold text-[#111111]">{{ $quantity }}</text>
                <column @press="incrementQty" class="w-[40] h-[40] rounded-full bg-[#F5F5F5] items-center justify-center">
                    <icon name="add" :size="20" color="#111111" />
                </column>
                <spacer class="w-[20]" />
                <text class="text-[14] text-[#484848]">Total: {{ $totalFormatted }}</text>
            </row>

            {{-- Add to Bag Button --}}
            <button @press="addToCart" class="w-full rounded bg-[#003399] text-white text-lg">Add to shopping bag</button>

            {{-- Favorite Button --}}
            <row @press="toggleFavorite" class="w-full py-3 rounded-lg items-center justify-center gap-2 bg-[#F5F5F5]">
                <icon
                    name="{{ $isFavorited ? 'favorite' : 'favorite_border' }}"
                    :size="20"
                    color="{{ $isFavorited ? '#CC0000' : '#484848' }}"
                />
                <text class="text-[14] text-[#111111]">{{ $isFavorited ? 'Saved to favorites' : 'Save to favorites' }}</text>
            </row>
        </column>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
