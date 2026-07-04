<column native:poll="2s" class="w-full h-full bg-theme-background">

    {{-- Fixed header: identity + online avatars --}}
    <column class="w-full px-5 pt-4 gap-3">
        @include('native._vibe-account')

        <row class="items-center gap-2">
            <text class="text-base text-theme-on-surface-variant">Online</text>
            <column class="px-2 py-[1] rounded-full bg-theme-surface-variant items-center justify-center">
                <text class="text-xs font-semibold text-theme-on-surface-variant">{{ count($members) }}</text>
            </column>
        </row>

        <row class="items-center gap-4">
            @foreach($members as $member)
                @php $isMe = $member === $vibeIdentity; @endphp
                <column class="items-center gap-1">
                    <column class="relative w-[60] h-[60]">
                        <column class="w-[60] h-[60] rounded-full border-2 {{ $isMe ? 'border-blue-600' : 'border-gray-300' }} items-center justify-center">
                            <image src="https://i.pravatar.cc/120?u={{ urlencode($member) }}" class="w-[50] h-[50] rounded-full" :fit="2" />
                        </column>
                        <column class="absolute bottom-0 right-0 w-[14] h-[14] rounded-full bg-green-500 border-2 border-white" />
                    </column>
                    <text class="text-sm text-theme-on-surface">{{ $member }}</text>
                </column>
            @endforeach
        </row>
    </column>

    {{-- Messages — flex-1 so they fill the middle and scroll on overflow. --}}
    <scroll-view class="flex-1 w-full mt-3">
        <column class="w-full px-5 gap-3">
            @foreach($messages as $m)
                @if($m['mine'])
                    <column class="w-full gap-1">
                        <row class="w-full justify-end">
                            <text class="text-sm text-theme-on-surface-variant pr-1">{{ $m['from'] }}</text>
                        </row>
                        <row class="w-full justify-end">
                            <column class="bg-blue-600 rounded-2xl px-4 py-3">
                                <text class="text-base font-semibold text-white">{{ $m['body'] }}</text>
                            </column>
                        </row>
                    </column>
                @else
                    <column class="w-full gap-1">
                        <row class="w-full">
                            <text class="text-sm text-theme-on-surface-variant pl-1">{{ $m['from'] }}</text>
                        </row>
                        <row class="w-full">
                            <column class="bg-theme-surface-variant rounded-2xl px-4 py-3">
                                <text class="text-base text-theme-on-surface">{{ $m['body'] }}</text>
                            </column>
                        </row>
                    </column>
                @endif
            @endforeach
        </column>
    </scroll-view>

    {{-- Typing indicator — loading dots (drifting periods = natural wave). --}}
    @if($typistName && $typingUntil > time())
        <row class="items-center gap-2 px-5 pb-1">
            <row class="items-center gap-1">
                <column class="w-[8] h-[8] rounded-full bg-gray-400" :scale="1.4" :opacity="0.4" :animate-duration="600" :animate-loop="true" animate-easing="ease-in-out" />
                <column class="w-[8] h-[8] rounded-full bg-gray-400" :scale="1.4" :opacity="0.4" :animate-duration="720" :animate-loop="true" animate-easing="ease-in-out" />
                <column class="w-[8] h-[8] rounded-full bg-gray-400" :scale="1.4" :opacity="0.4" :animate-duration="840" :animate-loop="true" animate-easing="ease-in-out" />
            </row>
            <text class="text-sm text-theme-on-surface-variant">{{ $typistName }} is typing…</text>
        </row>
    @endif

    {{-- Pinned pill input --}}
    <row class="w-full px-4 pb-4 pt-2 items-center">
        <row class="flex-1 items-center bg-theme-surface rounded-full border border-gray-200 pl-5 pr-1 py-1 gap-2">
            <bare-text-input :value="$draft" @change="onType" placeholder="Message" class="flex-1 py-2 text-theme-on-surface" />
            <stack @press="send" class="bg-blue-600 rounded-full px-6 py-3 items-center justify-center">
                <text class="text-base font-semibold text-white">Send</text>
            </stack>
        </row>
    </row>

</column>
