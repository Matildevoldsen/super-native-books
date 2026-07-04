<column class="w-full h-full bg-gray-50 safe-area">

    {{-- Top Bar --}}
    <column class="w-full bg-[#003399]">
        <row class="w-full px-4 py-3 items-center gap-3">
            <column @press="back" class="w-[32] h-[32] rounded-full bg-white/20 items-center justify-center">
                <icon name="arrow_back" :size="20" color="#FFFFFF" />
            </column>
            <text class="text-[18] font-bold text-white">Shopping bag ({{ $itemCount }})</text>
        </row>
    </column>

    {{-- Delivery Banner --}}
    @if ($freeDelivery)
        <row class="w-full bg-[#E8F5E9] px-4 py-2 items-center gap-2">
            <icon name="check_circle" :size="16" color="#0A8A00" />
            <text class="text-[13] text-[#0A8A00] font-semibold">You qualify for FREE delivery!</text>
        </row>
    @else
        <row class="w-full bg-[#FFF8E1] px-4 py-2 items-center gap-2">
            <icon name="local_shipping" :size="16" color="#E8860C" />
            <text class="text-[13] text-[#E8860C]">Add more for free delivery (orders over $500)</text>
        </row>
    @endif

    {{-- Cart Items --}}
    <scroll-view class="w-full h-full">
        <column class="w-full gap-0">
            @forelse ($items as $item)
                <column class="w-full bg-white px-4 py-3">
                    <row class="w-full gap-3">
                        {{-- Product Image --}}
                        <column class="w-[80] h-[80] bg-[#F5F5F5] rounded-lg items-center justify-center">
                            <image
                                src="{{ $item['imageUrl'] }}"
                                class="w-[70] h-[70] rounded-lg"
                                :fit="2"
                            />
                        </column>

                        {{-- Product Details --}}
                        <column class="w-[230] gap-1">
                            <text class="text-[13] font-bold text-[#111111]">{{ $item['seriesName'] }}</text>
                            <text class="text-[12] text-[#484848]" :maxLines="1">{{ $item['name'] }}</text>
                            <text class="text-[11] text-[#484848]">{{ $item['color'] }}</text>
                            <text class="text-[15] font-bold text-[#111111]">{{ $item['priceFormatted'] }}</text>

                            {{-- Quantity Controls --}}
                            <row class="items-center gap-3 pt-1">
                                <column @press="decrementItem({{ $item['productIndex'] }})" class="w-[28] h-[28] rounded-full bg-[#F5F5F5] items-center justify-center">
                                    <icon name="remove" :size="16" color="#111111" />
                                </column>
                                <text class="text-[14] font-bold text-[#111111]">{{ $item['qty'] }}</text>
                                <column @press="incrementItem({{ $item['productIndex'] }})" class="w-[28] h-[28] rounded-full bg-[#F5F5F5] items-center justify-center">
                                    <icon name="add" :size="16" color="#111111" />
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
                    <icon name="shopping_bag" :size="56" color="#CCCCCC" />
                    <text class="text-[16] text-[#999999]">Your shopping bag is empty</text>
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
                <text class="text-[13] text-[#484848]">Subtotal ({{ $itemCount }} items)</text>
                <text class="text-[14] text-[#111111]">{{ $subtotalFormatted }}</text>
            </row>
            <row class="w-full justify-between items-center">
                <text class="text-[13] text-[#484848]">Delivery</text>
                <text class="text-[14] text-{{ $freeDelivery ? '[#0A8A00]' : '[#111111]' }}">{{ $deliveryFeeFormatted }}</text>
            </row>
            <divider class="w-full" />
            <row class="w-full justify-between items-center">
                <text class="text-[16] font-bold text-[#111111]">Total</text>
                <text class="text-[18] font-bold text-[#111111]">{{ $totalFormatted }}</text>
            </row>
            <button
                label="Continue to checkout"
                @press="checkout"
                color="#003399"
                labelColor="#FFFFFF"
                :fontSize="16"
            />
        </column>
    @endif

</column>
