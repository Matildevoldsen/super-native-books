<column class="w-full h-full bg-theme-background gap-4">

    {{-- Message thread --}}
    <scroll-view class="w-full flex-1">
        <column class="w-full px-5 py-4 gap-3">

            {{-- Date divider --}}
            <row class="w-full justify-center my-2">
                <column class="px-3 py-1 rounded-full bg-theme-surface-variant">
                    <text class="text-[12] font-semibold text-theme-on-surface-variant">TODAY</text>
                </column>
            </row>

            {{-- Messages --}}
            @foreach ($messages as $m)
                @if ($m['fromMe'])
                    {{-- Outgoing — primary bubble, right-aligned --}}
                    <row class="w-full justify-end">
                        <column class="w-[280] bg-[#00677d] rounded-2xl px-4 py-3 gap-1">
                            <text class="text-[14] text-white">{{ $m['text'] }}</text>
                            <row class="items-center justify-end gap-1">
                                <text class="text-[10] text-[#a5f3fc]">{{ $m['time'] }}</text>
                                @if (($m['status'] ?? null) === 'read')
                                    <icon name="checkmark" :size="14" color="#a5f3fc"/>
                                @elseif (($m['status'] ?? null) === 'sent')
                                    <icon name="checkmark" :size="14" color="#7dd3fc"/>
                                @endif
                            </row>
                        </column>
                    </row>
                @else
                    {{-- Incoming — light gray bubble, left-aligned --}}
                    <row class="w-full">
                        <column class="w-[280] bg-theme-surface-variant rounded-2xl px-4 py-3 gap-1 border border-theme-outline">
                            @if (! empty($m['imageUrl']))
                                <image src="{{ $m['imageUrl'] }}" class="w-full h-[180] rounded-xl" :fit="2"/>
                            @endif
                            <text class="text-[14] text-theme-on-surface">{{ $m['text'] }}</text>
                            <row class="justify-end">
                                <text class="text-[10] text-theme-on-surface-variant">{{ $m['time'] }}</text>
                            </row>
                        </column>
                    </row>
                @endif
            @endforeach

            {{-- Typing indicator --}}
            <row class="w-full items-center gap-1 ml-2">
                <column class="w-[8] h-[8] rounded-full bg-[#cbd5e1] dark:bg-slate-600"/>
                <column class="w-[8] h-[8] rounded-full bg-[#cbd5e1] dark:bg-slate-600"/>
                <column class="w-[8] h-[8] rounded-full bg-[#cbd5e1] dark:bg-slate-600"/>
            </row>

        </column>
    </scroll-view>
    <divider/>
    <row class="w-full gap-2 w-full bg-theme-surface px-4 pt-3 items-center justify-center">
        <icon name="plus.circle.fill" :size="24" color="#64748b" dark-color="#94a3b8" class="glass:clear"/>
        <outlined-text-input
            value="{{ $draft }}"
            placeholder="Message..."
            @change="setDraft"
            class="flex-1 glass rounded-full"
            :variant="0"
            :multiline="true"
            leading-icon="face.smiling"
        />
        <icon name="paperplane.fill" :size="24" color="#94a3b8" dark-color="#64748b"/>
    </row>

    {{-- More-actions modal — opened by the NavBar ellipsis. Dismissible
         (tap backdrop to close). --}}
    <modal :visible="$showMoreActions" :dismissible="true" @dismiss="closeMoreActions">
        <column class="w-full p-2 bg-theme-surface rounded-3xl">
            <column @press="toggleMute" class="w-full px-5 py-4">
                <row class="items-center gap-3">
                    <icon name="{{ $isMuted ? 'speaker.slash.fill' : 'bell.fill' }}" :size="20" color="#0F172A" dark-color="#F1F5F9" />
                    <column class="flex-1 gap-1">
                        <text class="text-base font-semibold text-theme-on-surface">{{ $isMuted ? 'Unmute notifications' : 'Mute notifications' }}</text>
                        <text class="text-[12] text-theme-on-surface-variant">{{ $isMuted ? 'You will hear notifications again.' : 'No banners or sounds for this chat.' }}</text>
                    </column>
                </row>
            </column>
            <divider />
            <column @press="askClearHistory" class="w-full px-5 py-4">
                <row class="items-center gap-3">
                    <icon name="trash.fill" :size="20" color="#EF4444" />
                    <column class="flex-1 gap-1">
                        <text class="text-base font-semibold text-[#EF4444]">Clear history</text>
                        <text class="text-[12] text-theme-on-surface-variant">Removes every message in this chat. Cannot be undone.</text>
                    </column>
                </row>
            </column>
            <divider />
            <column @press="closeMoreActions" class="w-full px-5 py-4">
                <row class="items-center justify-center gap-2">
                    <text class="text-base font-medium text-theme-on-surface-variant">Cancel</text>
                </row>
            </column>
        </column>
    </modal>

    {{-- Blocking clear-history confirmation. dismissible=false so the user
         must explicitly choose. --}}
    <modal :visible="$showClearConfirm" :dismissible="false">
        <column class="w-full p-6 gap-4 bg-theme-surface rounded-3xl">
            <text class="text-xl font-bold text-theme-on-surface">Clear chat history?</text>
            <text class="text-sm text-theme-on-surface-variant">This permanently deletes the message thread. There's no undo.</text>
            <row class="w-full gap-2 mt-2">
                <column @press="cancelClearHistory" class="flex-1 px-4 py-3 rounded-xl bg-theme-surface-variant items-center">
                    <text class="font-semibold text-theme-on-surface">Cancel</text>
                </column>
                <column @press="confirmClearHistory" class="flex-1 px-4 py-3 rounded-xl bg-[#EF4444] items-center">
                    <text class="text-white font-semibold">Delete</text>
                </column>
            </row>
        </column>
    </modal>

</column>
