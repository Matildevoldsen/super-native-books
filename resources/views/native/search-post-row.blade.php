<row class="items-start gap-3 px-4 py-3" @press="openPost({{ $post['id'] }})">
    <column class="w-10 h-10 rounded-full bg-blue-600 items-center justify-center">
        <text class="text-red-700 font-semibold">P</text>
    </column>
    <column class="flex-1 gap-1">
        <text class="font-semibold">{{ str($post['title'])->title()->limit(20) }}</text>
        <text class="text-sm text-gray-500">
            {{ str($post['body'])->limit(100) }}
        </text>
    </column>
    <text class="text-xs text-slate-700 px-2 py-1 rounded bg-gray-100">
        #{{ $post['id'] }}
    </text>
</row>
