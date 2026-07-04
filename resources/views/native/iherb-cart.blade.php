<column class="w-full h-full bg-gray-50 safe-area">

    {{-- Top Bar --}}
    <column class="w-full bg-[#507D2A]">
        <row class="w-full px-4 py-3 items-center gap-3">
            <column @press="back" class="w-[32] h-[32] rounded-full bg-white/20 items-center justify-center">
                <icon name="arrow_back" :size="20" color="#FFFFFF" />
            </column>
            <text class="text-[18] font-bold text-white">Cart ({{ $itemCount }})</text>
        </row>
    </column>

    {{-- Free Shipping Banner --}}
    @if ($freeShipping)
        <row class="w-full bg-[#E8F5E9] px-4 py-2 items-center gap-2">
            <icon name="check_circle" :size="16" color="#507D2A" />
            <text class="text-[13] text-[#507D2A] font-semibold">You qualify for FREE shipping!</text>
        </row>
    @else
        <row class="w-full bg-[#FFF3E0] px-4 py-2 items-center gap-2">
            <icon name="local_shipping" :size="16" color="#E8860C" />
            <text class="text-[13] text-[#E8860C]">Add more for free shipping (orders over $30)</text>
        </row>
    @endif

    {{-- Cart Items --}}
    <scroll-view class="w-full h-full">
        <column class="w-full gap-0">
            @forelse ($items as $item)
                <column class="w-full bg-white px-4 py-3">
                    <row class="w-full gap-3">
                        {{-- Product Image --}}
                        <image
                            src="{{ $item['imageUrl'] }}"
                            class="w-[80] h-[80] rounded-lg bg-gray-100"
                            :fit="2"
                        />

                        {{-- Product Details --}}
                        <column class="w-[230] gap-1">
                            <text class="text-[11] text-[#507D2A]">{{ $item['brand'] }}</text>
                            <text class="text-[13] text-[#333333]" :maxLines="2">{{ $item['name'] }}</text>
                            <text class="text-[15] font-bold text-[#333333]">{{ $item['priceFormatted'] }}</text>

                            {{-- Quantity Controls --}}
                            <row class="items-center gap-3 pt-1">
                                <column @press="decrementItem({{ $item['productIndex'] }})" class="w-[28] h-[28] rounded-full bg-gray-200 items-center justify-center">
                                    <icon name="remove" :size="16" color="#333333" />
                                </column>
                                <text class="text-[14] font-bold text-[#333333]">{{ $item['qty'] }}</text>
                                <column @press="incrementItem({{ $item['productIndex'] }})" class="w-[28] h-[28] rounded-full bg-gray-200 items-center justify-center">
                                    <icon name="add" :size="16" color="#333333" />
                                </column>
                                <spacer class="w-[20]" />
                                <column @press="removeItem({{ $item['productIndex'] }})">
                                    <icon name="delete_outline" :size="20" color="#CC0000" />
                                </column>
                            </row>
                        </column>
                    </row>
                </column>
                <divider class="w-full" />
            @empty
                <column class="w-full bg-white items-center py-12 gap-3">
                    <icon name="shopping_cart" :size="56" color="#CCCCCC" />
                    <text class="text-[16] text-[#999999]">Your cart is empty</text>
                    <text class="text-[13] text-[#999999]">Browse products and add items to get started</text>
                </column>
            @endforelse
        </column>
    </scroll-view>

    {{-- Bottom Checkout Bar --}}
    @if (count($items) > 0)
        <divider class="w-full" />
        <column class="w-full bg-white px-4 py-3 gap-2">
            <row class="w-full justify-between items-center">
                <text class="text-[14] text-[#666666]">Subtotal ({{ $itemCount }} items)</text>
                <text class="text-[18] font-bold text-[#333333]">{{ $subtotalFormatted }}</text>
            </row>
            <button
                label="Proceed to Checkout"
                @press="checkout"
                color="#E8860C"
                labelColor="#FFFFFF"
                :fontSize="16"
            />
        </column>
    @endif

</column>
