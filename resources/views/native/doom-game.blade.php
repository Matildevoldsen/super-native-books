<column class="flex-1 w-full bg-zinc-900">
    <scroll-view class="flex-1 w-full">
        <column class="p-6 gap-5 safe-area items-center">

            <spacer class="h-8" />

            {{-- Title --}}
            <column class="items-center gap-1">
                <text class="text-5xl font-extrabold text-red-500">DOOM</text>
                <text class="text-base font-bold text-red-400">PHP Edition</text>
            </column>

            <text class="text-xs text-zinc-600">Every enemy is an Eloquent model</text>

            <spacer class="h-2" />

            {{-- Server Status --}}
            <column class="w-full bg-zinc-800 rounded-2xl p-4 gap-3">
                <row class="w-full items-center justify-between">
                    <text class="text-xs font-bold text-zinc-500">SERVER</text>
                    <pressable @press="checkServer">
                        <text class="text-xs font-bold text-zinc-500">REFRESH</text>
                    </pressable>
                </row>

                <row class="w-full items-center gap-3">
                    <column class="{{ $serverOnline ? 'bg-green-500' : 'bg-red-500' }} rounded-full w-3 h-3" />
                    <column class="flex-1 gap-1">
                        <text class="text-sm font-bold {{ $serverOnline ? 'text-green-400' : 'text-red-400' }}">{{ $serverOnline ? 'ONLINE' : 'OFFLINE' }}</text>
                        <text class="text-xs text-zinc-500">{{ config('doom.server_host', '127.0.0.1') }}:{{ config('doom.server_port', 9001) }}</text>
                    </column>
                </row>
            </column>

            {{-- Player Name --}}
            <column class="w-full bg-zinc-800 rounded-2xl p-4 gap-2">
                <text class="text-xs font-bold text-zinc-500">PLAYER NAME</text>
                <text class="text-lg font-bold text-white">{{ $playerName }}</text>
            </column>

            <spacer class="h-2" />

            {{-- Multiplayer --}}
            <pressable @press="findMatch" class="w-full bg-blue-600 rounded-2xl py-5 items-center {{ $serverOnline ? '' : 'opacity-50' }}">
                <text class="text-xl font-extrabold text-white">FIND MATCH</text>
                @if(!$serverOnline)
                <text class="text-xs text-blue-200">Server offline</text>
                @endif
            </pressable>

            {{-- Solo --}}
            <pressable @press="startGame" class="w-full bg-red-600 rounded-2xl py-5 items-center">
                <text class="text-xl font-extrabold text-white">SOLO (vs AI)</text>
            </pressable>

            @if($matchStatus !== '')
            <column class="w-full bg-zinc-800 rounded-2xl p-4 items-center">
                <text class="text-sm font-bold text-zinc-300">{{ $matchStatus }}</text>
            </column>
            @endif

            @if($isMultiplayer)
            <pressable @press="disconnectMatch" class="w-full bg-zinc-700 rounded-2xl py-4 items-center">
                <text class="text-sm font-bold text-red-400">DISCONNECT</text>
            </pressable>
            @endif

            <spacer class="h-2" />

            {{-- Stats --}}
            <column class="w-full bg-zinc-800 rounded-2xl p-4 gap-4">

                <row class="w-full items-center justify-between">
                    <text class="text-xs font-bold text-zinc-500">CAREER</text>
                </row>

                <row class="w-full gap-3">
                    <column class="flex-1 bg-zinc-700 rounded-xl p-3 items-center gap-1">
                        <text class="text-2xl font-extrabold text-white">{{ $gamesPlayed }}</text>
                        <text class="text-xs text-zinc-400">Games</text>
                    </column>
                    <column class="flex-1 bg-zinc-700 rounded-xl p-3 items-center gap-1">
                        <text class="text-2xl font-extrabold text-red-400">{{ $totalKills }}</text>
                        <text class="text-xs text-zinc-400">Kills</text>
                    </column>
                </row>

            </column>

            @if($mpKills > 0 || $mpDeaths > 0)
            {{-- PvP Stats --}}
            <column class="w-full bg-zinc-800 rounded-2xl p-4 gap-4">

                <text class="text-xs font-bold text-zinc-500">LAST MATCH (PvP)</text>

                <row class="w-full gap-3">
                    <column class="flex-1 bg-zinc-700 rounded-xl p-3 items-center gap-1">
                        <text class="text-2xl font-extrabold text-red-400">{{ $mpKills }}</text>
                        <text class="text-xs text-zinc-400">Kills</text>
                    </column>
                    <column class="flex-1 bg-zinc-700 rounded-xl p-3 items-center gap-1">
                        <text class="text-2xl font-extrabold text-zinc-400">{{ $mpDeaths }}</text>
                        <text class="text-xs text-zinc-400">Deaths</text>
                    </column>
                    <column class="flex-1 bg-zinc-700 rounded-xl p-3 items-center gap-1">
                        <text class="text-2xl font-extrabold text-yellow-400">{{ $lastScore }}</text>
                        <text class="text-xs text-zinc-400">Score</text>
                    </column>
                </row>

            </column>
            @elseif($lastScore > 0)
            {{-- Solo Stats --}}
            <column class="w-full bg-zinc-800 rounded-2xl p-4 gap-4">

                <text class="text-xs font-bold text-zinc-500">LAST GAME</text>

                <row class="w-full gap-3">
                    <column class="flex-1 bg-zinc-700 rounded-xl p-3 items-center gap-1">
                        <text class="text-2xl font-extrabold text-yellow-400">{{ $lastScore }}</text>
                        <text class="text-xs text-zinc-400">Score</text>
                    </column>
                    <column class="flex-1 bg-zinc-700 rounded-xl p-3 items-center gap-1">
                        <text class="text-2xl font-extrabold text-red-400">{{ $lastKills }}</text>
                        <text class="text-xs text-zinc-400">Kills</text>
                    </column>
                </row>

            </column>
            @endif

            {{-- Sync Button --}}
            <pressable @press="checkResults" class="w-full bg-zinc-800 rounded-2xl py-4 items-center">
                <text class="text-sm font-bold text-zinc-400">SYNC RESULTS</text>
            </pressable>

            <spacer class="h-4" />

        </column>
    </scroll-view>
</column>
