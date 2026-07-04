<scroll-view class="w-full h-full bg-white">
    <column class="w-full gap-0 ">

        {{-- Top Bar --}}
        <column class="w-full bg-[#507D2A]">
            <row class="w-full px-4 py-3 items-center justify-between">
                <column @press="back" class="w-[32] h-[32] rounded-full bg-white/20 items-center justify-center">
                    <icon name="arrow_back" :size="20" color="#FFFFFF" />
                </column>
                <row class="items-center gap-3">
                    <column @press="toggleWishlist">
                        <icon
                            name="{{ $isWishlisted ? 'favorite' : 'favorite_border' }}"
                            :size="22"
                            color="#FFFFFF"
                        />
                    </column>
                    <icon name="share" :size="22" color="#FFFFFF" />
                </row>
            </row>
        </column>

        {{-- Product Image --}}
        <column class="w-full items-center bg-gray-50 py-6">
            <image
                src="{{ $product['imageUrl'] }}"
                class="w-[250] h-[250]"
                :fit="1"
            />
        </column>

        {{-- Product Info --}}
        <column class="w-full px-4 pt-4 gap-2">
            {{-- Brand --}}
            <text class="text-[13] text-[#507D2A] font-semibold">{{ $product['brand'] }}</text>

            {{-- Name --}}
            <text class="text-[18] font-bold text-[#333333]">{{ $product['name'] }}</text>

            {{-- Rating --}}
            <row class="items-center gap-2">
                <row class="items-center gap-0">
                    <icon name="star" :size="16" color="#DAA520" />
                    <icon name="star" :size="16" color="#DAA520" />
                    <icon name="star" :size="16" color="#DAA520" />
                    <icon name="star" :size="16" color="#DAA520" />
                    <icon name="star_half" :size="16" color="#DAA520" />
                </row>
                <text class="text-[13] text-[#507D2A]">{{ $reviewFormatted }}</text>
            </row>

            {{-- Stock & Popularity --}}
            <row class="items-center justify-between">
                @if ($product['inStock'])
                    <text class="text-[13] text-[#507D2A] font-semibold">In stock</text>
                @else
                    <text class="text-[13] text-[#CC0000] font-semibold">Out of stock</text>
                @endif
                <row class="items-center gap-1">
                    <icon name="trending_up" :size="14" color="#CC0000" />
                    <text class="text-[12] text-[#CC0000]">{{ $product['soldIn30Days'] }} sold in 30 days</text>
                </row>
            </row>
        </column>

        <divider class="w-full mx-4 my-3" />

        {{-- Details --}}
        <column class="w-full px-4 gap-2">
            <row class="items-center gap-2">
                <icon name="verified" :size="16" color="#507D2A" />
                <text class="text-[13] text-[#333333]">100% authentic</text>
            </row>
            @if ($product['bestBy'])
                <row class="items-center gap-2">
                    <icon name="event" :size="16" color="#666666" />
                    <text class="text-[13] text-[#333333]">Best by: {{ $product['bestBy'] }}</text>
                </row>
            @endif
            <row class="items-center gap-2">
                <icon name="local_shipping" :size="16" color="#666666" />
                <text class="text-[13] text-[#333333]">Shipping weight: {{ $product['shippingWeight'] }}</text>
            </row>
        </column>

        <divider class="w-full mx-4 my-3" />

        {{-- Product Rankings --}}
        <column class="w-full px-4 gap-1">
            <text class="text-[14] font-semibold text-[#E8860C]">Product rankings</text>
            @foreach ($product['rankings'] as $ranking)
                <text class="text-[13] text-[#507D2A]">{{ $ranking }}</text>
            @endforeach
        </column>

        <divider class="w-full mx-4 my-3" />

        {{-- Description --}}
        <column class="w-full px-4 gap-2">
            <text class="text-[15] font-semibold text-[#333333]">Description</text>
            <text class="text-[14] text-[#666666]">{{ $product['description'] }}</text>
        </column>

        <divider class="w-full mx-4 my-4" />

        {{-- Price & Add to Cart --}}
        <column class="w-full px-4 pb-4 gap-3">
            {{-- Price --}}
            <row class="items-center gap-2">
                <text class="text-[24] font-bold text-[#333333]">{{ $priceFormatted }}</text>
                @if ($originalPriceFormatted)
                    <text class="text-[15] text-[#999999] line-through">{{ $originalPriceFormatted }}</text>
                @endif
            </row>
            @if ($product['servingInfo'])
                <text class="text-[12] text-[#666666] mt-[-4]">{{ $product['servingInfo'] }}</text>
            @endif

            {{-- Free Shipping --}}
            <row class="items-center gap-1">
                <icon name="local_shipping" :size="14" color="#507D2A" />
                <text class="text-[12] text-[#507D2A]">FREE shipping over $30</text>
            </row>

            {{-- Quantity Selector --}}
            <row class="items-center gap-4">
                <column @press="decrementQty" class="w-[36] h-[36] rounded-full bg-gray-200 items-center justify-center">
                    <icon name="remove" :size="20" color="#333333" />
                </column>
                <text class="text-[18] font-bold text-[#333333]">{{ $quantity }}</text>
                <column @press="incrementQty" class="w-[36] h-[36] rounded-full bg-gray-200 items-center justify-center">
                    <icon name="add" :size="20" color="#333333" />
                </column>
                <spacer class="w-[20]" />
                <text class="text-[14] text-[#666666]">Total: {{ $totalFormatted }}</text>
            </row>

            {{-- Add to Cart Button --}}
            <button
                label="Add to Cart"
                @press="addToCart"
                color="#E8860C"
                labelColor="#FFFFFF"
                :fontSize="16"
            />

            {{-- Wishlist Button --}}
            <row @press="toggleWishlist" class="w-full py-3 rounded-lg items-center justify-center gap-2 bg-gray-100">
                <icon
                    name="{{ $isWishlisted ? 'favorite' : 'favorite_border' }}"
                    :size="20"
                    color="{{ $isWishlisted ? '#CC0000' : '#666666' }}"
                />
                <text class="text-[14] text-[#333333]">{{ $isWishlisted ? 'Saved to List' : 'Add to Lists' }}</text>
            </row>
        </column>

        <spacer class="h-[20]" />

    </column>
</scroll-view>
