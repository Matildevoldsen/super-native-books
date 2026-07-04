@php
    use App\Icons\Android;
    use App\Icons\Ios;
@endphp

<stack class="w-full h-full bg-theme-background">
    <list :separator="true" class="w-full h-full bg-theme-background">
        <list-section header="Books">
            @foreach ($books as $index => $book)
                <list-item
                    :native:key="$book['id']"
                    @press="bumpRatingAt({{ $index }})"
                    :leadingMonogram="strtoupper(substr($book['title'], 0, 1))"
                    :leadingMonogramColor="$book['color']"
                    :headline="$book['title']"
                    :supporting="$book['description']"
                    :trailingText="str_repeat('★', $book['rating']) . str_repeat('☆', 5 - $book['rating'])"
                    :trailingTextColor="'#F59E0B'"
                    :leading-actions="[
                        [
                            'method' => 'openEditAt(' . $index . ')',
                            'label' => 'Edit',
                            'ios' => Ios::Pencil,
                            'android' => Android::Edit,
                            'tint' => '#2563EB',
                        ],
                    ]"
                    :trailing-actions="[
                        [
                            'method' => 'deleteBookAt(' . $index . ')',
                            'label' => 'Delete',
                            'ios' => Ios::Trash,
                            'android' => Android::Delete,
                            'role' => 'destructive',
                        ],
                    ]" />
            @endforeach
        </list-section>

        <list-section header="Rating">
            <column class="w-full px-5 py-4 gap-3">
                <text class="text-base font-semibold text-theme-on-surface">Tap a row to cycle rating</text>
                <text class="text-sm text-theme-on-surface-variant">{{ $lastAction }}</text>

                <row class="w-full items-center justify-center gap-1">
                    @for ($star = 1; $star <= 5; $star++)
                        <text
                            class="text-[34] text-[#F59E0B]"
                            :scale="$ratingPulse % 2 === 0 ? 1 : 1.12"
                            :opacity="$star <= 4 ? 1 : 0.45"
                            :animate-duration="220"
                            animate-easing="ease-out">★</text>
                    @endfor
                </row>
            </column>
        </list-section>

        @if ($books === [])
            <column class="w-full items-center justify-center py-20 gap-2">
                <text class="text-lg font-semibold text-theme-on-surface">Shelf cleared</text>
                <text class="text-sm text-theme-on-surface-variant">All books were removed with swipe delete.</text>
            </column>
        @endif
    </list>

    <bottom-sheet :visible="$showEditSheet" @dismiss="closeEdit" detents="medium,large">
        <column class="w-full p-5 gap-4">
            <column class="w-full gap-1">
                <text class="text-xl font-bold text-theme-on-surface">Edit book</text>
                <text class="text-sm text-theme-on-surface-variant">Opened from the list item swipe action.</text>
            </column>

            <outlined-text-input
                class="w-full"
                label="Title"
                :value="$editTitle"
                @change="updateEditTitle" />

            <outlined-text-input
                class="w-full"
                label="Description"
                :value="$editDescription"
                multiline
                :max-lines="4"
                @change="updateEditDescription" />

            <column class="w-full gap-2">
                <text class="text-sm font-semibold text-theme-on-surface-variant">Rating</text>
                <row class="w-full items-center justify-between">
                    @for ($star = 1; $star <= 5; $star++)
                        <pressable
                            @press="setEditRating({{ $star }})"
                            class="w-[48] h-[48] items-center justify-center rounded-full"
                            :press-scale="0.82">
                            <text
                                class="text-[34]"
                                :color="$star <= $editRating ? '#F59E0B' : '#CBD5E1'"
                                :scale="$star === $editRating && $ratingPulse % 2 === 1 ? 1.28 : 1.0"
                                :animate-duration="260"
                                animate-easing="ease-out">{{ $star <= $editRating ? '★' : '☆' }}</text>
                        </pressable>
                    @endfor
                </row>
            </column>

            <row class="w-full gap-3 pt-2">
                <button label="Cancel" @press="closeEdit" class="flex-1" />
                <button label="Save" @press="saveBook" class="flex-1" />
            </row>
        </column>
    </bottom-sheet>
</stack>
