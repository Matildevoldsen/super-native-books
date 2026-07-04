@include('native.partials.demo-nav', ['title' => 'Skia Canvas'])

<scroll-view class="w-full h-full bg-[#0f0f1e]">
    <column class="w-full px-4 pt-4 pb-8 gap-6 ">

        {{-- 1. BASIC SHAPES --}}
        <text class="text-2xl font-bold text-indigo-600">Basic Shapes</text>

        <skia-canvas class="w-full h-[100] rounded-xl">
            <skia-rect :x="0" :y="0" :width="400" :height="100" color="#1a1a2e" />
            <skia-rect :x="15" :y="15" :width="60" :height="60" color="#6C63FF" />
            <skia-circle :cx="120" :cy="45" :r="30" color="#e94560" />
            <skia-oval :x="170" :y="15" :width="70" :height="50" color="#4CAF50" />
            <skia-arc :cx="280" :cy="45" :r="30" :startAngle="-90" :sweepAngle="270" color="#FF9800" style="fill" :useCenter="1" />
        </skia-canvas>

        {{-- 2. LINES & PATHS --}}
        <text class="text-2xl font-bold text-cyan-600">Lines & Paths</text>

        <skia-canvas class="w-full h-[100] rounded-xl">
            <skia-rect :x="0" :y="0" :width="400" :height="100" color="#1a1a2e" />
            <skia-line :x1="15" :y1="20" :x2="100" :y2="20" color="#6C63FF" :strokeWidth="2" />
            <skia-line :x1="15" :y1="50" :x2="100" :y2="50" color="#00d2ff" :strokeWidth="6" strokeCap="round" />
            <skia-path path="M 120,50 Q 145,10 170,50 Q 195,90 220,50" color="#4CAF50" style="stroke" :strokeWidth="3" strokeCap="round" />
            <skia-polygon points="300,15 330,50 300,85 270,50" color="#FFD700" />
        </skia-canvas>

        {{-- 3. TEXT --}}
        <text class="text-2xl font-bold text-yellow-500">Text</text>

        <skia-canvas class="w-full h-[80] rounded-xl">
            <skia-rect :x="0" :y="0" :width="400" :height="80" color="#1a1a2e" />
            <skia-text :x="15" :y="30" text="Regular Text" :fontSize="14" color="#FFFFFF" />
            <skia-text :x="15" :y="55" text="Bold Text" :fontSize="14" color="#00d2ff" align="end" :bold="1" />
            <skia-text :x="200" :y="30" text="Center" :fontSize="16" color="#e94560" align="center" :bold="1" />
        </skia-canvas>

        {{-- 4. GRADIENTS --}}
        <text class="text-2xl font-bold text-[#e94560]">Gradients</text>

        <skia-canvas class="w-full h-[120] rounded-xl">
            <skia-rect :x="0" :y="0" :width="400" :height="120" color="#1a1a2e" />

            <skia-rect :x="15" :y="15" :width="100" :height="55" :borderRadius="8"
                gradientType="linear" gradientColors="#6C63FF,#00d2ff"
                :gradientStartX="15" :gradientStartY="15" :gradientEndX="115" :gradientEndY="15" />
            <skia-text :x="65" :y="88" text="Linear" :fontSize="10" color="#8888aa" align="center" />

            <skia-circle :cx="190" :cy="42" :r="32"
                gradientType="radial" gradientColors="#FF9800,#e94560,#1a1a2e"
                :gradientCenterX="190" :gradientCenterY="35" :gradientRadius="32" />
            <skia-text :x="190" :y="88" text="Radial" :fontSize="10" color="#8888aa" align="center" />

            <skia-circle :cx="300" :cy="42" :r="32"
                gradientType="sweep" gradientColors="#6C63FF,#00d2ff,#4CAF50,#FFD700,#e94560,#6C63FF"
                :gradientCenterX="300" :gradientCenterY="42" />
            <skia-text :x="300" :y="88" text="Sweep" :fontSize="10" color="#8888aa" align="center" />
        </skia-canvas>

        {{-- 5. ANIMATIONS --}}
        <text class="text-2xl font-bold text-[#4CAF50]">Animations</text>

        <row class="w-full gap-3">
            <column class="flex-1 items-center gap-2">
                <skia-canvas class="w-[140] h-[140] rounded-xl">
                    <skia-rect :x="0" :y="0" :width="140" :height="140" color="#1a1a2e" />

                    <skia-value name="pulse" :from="0.6" :to="1" :duration="1.5"
                        :running="$pulseRunning ? 1 : 0" :loop="1" easing="easeInOut" />

                    <skia-circle :cx="70" :cy="65" :r="45" color="#6C63FF" bind-opacity="pulse" :opacity="0.3" />
                    <skia-circle :cx="70" :cy="65" :r="30" bind-r="pulse"
                        gradientType="radial" gradientColors="#6C63FF,#00d2ff"
                        :gradientCenterX="70" :gradientCenterY="58" :gradientRadius="30" />
                    <skia-text :x="70" :y="130" text="Pulsing" :fontSize="10" color="#8888aa" align="center" />
                </skia-canvas>

                <button @press="togglePulse" class="bg-[#333355] rounded-full px-4 py-2 text-white text-[12]">
                    {{ $pulseRunning ? 'Pause' : 'Play' }}
                </button>
            </column>

            <column class="flex-1 items-center gap-2">
                <skia-canvas class="w-[140] h-[140] rounded-xl">
                    <skia-rect :x="0" :y="0" :width="140" :height="140" color="#1a1a2e" />

                    <skia-value name="spin" :from="0" :to="360" :duration="2"
                        :running="$spinRunning ? 1 : 0" :loop="1" easing="linear" />

                    <skia-circle :cx="70" :cy="65" :r="35" color="#333355" style="stroke" :strokeWidth="6" />
                    <skia-arc :cx="70" :cy="65" :r="35" bind-startAngle="spin" :startAngle="1" :sweepAngle="90"
                        color="#00d2ff" style="stroke" :strokeWidth="6" strokeCap="round" />
                    <skia-text :x="70" :y="130" text="Spinner" :fontSize="10" color="#8888aa" align="center" />
                </skia-canvas>

                <button @press="toggleSpin" class="bg-[#333355] rounded-full px-4 py-2 text-white text-[12]">
                    {{ $spinRunning ? 'Pause' : 'Play' }}
                </button>
            </column>
        </row>

        {{-- 6. TIMER RING --}}
        <text class="text-2xl font-bold text-[#e94560]">Timer Ring</text>

        @php $totalSec = $timerSeconds; @endphp

        <column class="w-full items-center gap-4">
            <skia-canvas class="w-[220] h-[220] rounded-xl">
                <skia-rect :x="0" :y="0" :width="220" :height="220" color="#1a1a2e" />

                <skia-value name="countdown" :from="1" :to="0"
                    :duration="$totalSec" :running="$timerRunning ? 1 : 0" easing="linear" />

                <skia-circle :cx="110" :cy="110" :r="100"
                    colorStops="#FF4757,#FF9800,#FFEB3B,#4CAF50" bind-color="countdown"
                    color="#6C63FF" :opacity="0.12" />

                <skia-circle :cx="110" :cy="110" :r="85" color="#333355" style="stroke" :strokeWidth="12" />

                <skia-arc :cx="110" :cy="110" :r="85" :startAngle="-90" :sweepAngle="360"
                    bind-sweepAngle="countdown" bind-color="countdown"
                    colorStops="#FF4757,#FF9800,#FFEB3B,#4CAF50"
                    style="stroke" :strokeWidth="12" strokeCap="round" />

                <skia-text :x="110" :y="118"
                    bindText="countdown" textFormat="time" :totalValue="$totalSec"
                    :fontSize="36" colorStops="#FF4757,#FF9800,#FFEB3B,#4CAF50" bind-color="countdown"
                    color="#6C63FF" align="center" :bold="1" />

                <skia-text :x="110" :y="145" text="REMAINING" :fontSize="9" color="#666688" align="center" />
            </skia-canvas>

            <row class="gap-2">
                <button @press="setTimerSeconds(10)" class="bg-[#333355] rounded-full px-3 py-2 text-white text-[12]">10s</button>
                <button @press="setTimerSeconds(30)" class="bg-[#333355] rounded-full px-3 py-2 text-white text-[12]">30s</button>
                <button @press="setTimerSeconds(60)" class="bg-[#333355] rounded-full px-3 py-2 text-white text-[12]">1m</button>
                <button @press="setTimerSeconds(300)" class="bg-[#333355] rounded-full px-3 py-2 text-white text-[12]">5m</button>
            </row>

            @if($timerRunning)
                <button @press="toggleTimer" class="bg-[#FF4757] rounded-2xl px-8 py-3 text-white text-[16] font-bold">Cancel</button>
            @else
                <button @press="toggleTimer" class="bg-[#6C63FF] rounded-2xl px-8 py-3 text-white text-[16] font-bold">Start Timer</button>
            @endif
        </column>

        {{-- 7. BAR CHART --}}
        <text class="text-2xl font-bold text-[#FF9800]">Animated Bar Chart</text>

        <skia-canvas class="w-full h-[200] rounded-xl">
            <skia-rect :x="0" :y="0" :width="400" :height="200" color="#1a1a2e" />

            <skia-value name="grow" :from="0" :to="1" :duration="1.5"
                :running="$barAnimRunning" :loop="0" easing="easeOut" />

            <skia-line :x1="0" :y1="50" :x2="400" :y2="50" color="#2a2a4e" :strokeWidth="0.5" />
            <skia-line :x1="0" :y1="100" :x2="400" :y2="100" color="#2a2a4e" :strokeWidth="0.5" />
            <skia-line :x1="0" :y1="150" :x2="400" :y2="150" color="#2a2a4e" :strokeWidth="0.5" />

            <skia-rect :x="20" :y="110" :width="40" :height="70" bind-height="grow" :borderRadius="4"
                gradientType="linear" gradientColors="#6C63FF,#9b93ff"
                :gradientStartX="20" :gradientStartY="180" :gradientEndX="20" :gradientEndY="110" />
            <skia-rect :x="75" :y="70" :width="40" :height="110" bind-height="grow" :borderRadius="4"
                gradientType="linear" gradientColors="#00d2ff,#66e5ff"
                :gradientStartX="75" :gradientStartY="180" :gradientEndX="75" :gradientEndY="70" />
            <skia-rect :x="130" :y="40" :width="40" :height="140" bind-height="grow" :borderRadius="4"
                gradientType="linear" gradientColors="#e94560,#ff7b93"
                :gradientStartX="130" :gradientStartY="180" :gradientEndX="130" :gradientEndY="40" />
            <skia-rect :x="185" :y="60" :width="40" :height="120" bind-height="grow" :borderRadius="4"
                gradientType="linear" gradientColors="#4CAF50,#81C784"
                :gradientStartX="185" :gradientStartY="180" :gradientEndX="185" :gradientEndY="60" />
            <skia-rect :x="240" :y="90" :width="40" :height="90" bind-height="grow" :borderRadius="4"
                gradientType="linear" gradientColors="#FF9800,#FFB74D"
                :gradientStartX="240" :gradientStartY="180" :gradientEndX="240" :gradientEndY="90" />
            <skia-rect :x="295" :y="30" :width="40" :height="150" bind-height="grow" :borderRadius="4"
                gradientType="linear" gradientColors="#FFD700,#FFEB3B"
                :gradientStartX="295" :gradientStartY="180" :gradientEndX="295" :gradientEndY="30" />

            <skia-text :x="40" :y="195" text="M" :fontSize="10" color="#666688" align="center" />
            <skia-text :x="95" :y="195" text="T" :fontSize="10" color="#666688" align="center" />
            <skia-text :x="150" :y="195" text="W" :fontSize="10" color="#666688" align="center" />
            <skia-text :x="205" :y="195" text="T" :fontSize="10" color="#666688" align="center" />
            <skia-text :x="260" :y="195" text="F" :fontSize="10" color="#666688" align="center" />
            <skia-text :x="315" :y="195" text="S" :fontSize="10" color="#666688" align="center" />
            <skia-text :x="15" :y="18" text="Weekly Revenue" :fontSize="12" color="#FFFFFF" />
        </skia-canvas>

        <button @press="toggleBars" class="bg-[#333355] rounded-full px-6 py-2 text-white text-[13]">
            Replay Bars
        </button>

        {{-- 8. GAUGE --}}
        <text class="text-2xl font-bold text-cyan-600">Gauge</text>

        <column class="w-full items-center">
            <skia-canvas class="w-[240] h-[160] rounded-xl">
                <skia-rect :x="0" :y="0" :width="240" :height="160" color="#1a1a2e" />

                <skia-value name="gauge" :from="0" :to="1" :duration="3"
                    :running="1" :loop="1" easing="easeInOut" />

                <skia-arc :cx="120" :cy="110" :r="80" :startAngle="-210" :sweepAngle="240"
                    color="#333355" style="stroke" :strokeWidth="14" strokeCap="round" />

                <skia-arc :cx="120" :cy="110" :r="80" :startAngle="-210" :sweepAngle="240"
                    bind-sweepAngle="gauge"
                    colorStops="#4CAF50,#FFEB3B,#FF9800,#e94560" bind-color="gauge"
                    style="stroke" :strokeWidth="14" strokeCap="round" />

                <skia-text :x="120" :y="115"
                    bindText="gauge" textFormat="percent"
                    :fontSize="28" colorStops="#4CAF50,#FFEB3B,#FF9800,#e94560" bind-color="gauge"
                    color="#FFFFFF" align="center" :bold="1" />

                <skia-text :x="120" :y="140" text="SPEED" :fontSize="10" color="#666688" align="center" />
            </skia-canvas>
        </column>

        {{-- 9. PIE CHART --}}
        <text class="text-2xl font-bold text-[#FF9800]">Pie Chart</text>

        <column class="w-full items-center">
            <skia-canvas class="w-[220] h-[220] rounded-xl">
                <skia-rect :x="0" :y="0" :width="220" :height="220" color="#1a1a2e" />

                <skia-arc :cx="110" :cy="100" :r="75" :startAngle="-90" :sweepAngle="120" color="#6C63FF" :useCenter="1" />
                <skia-arc :cx="110" :cy="100" :r="75" :startAngle="30" :sweepAngle="90" color="#00d2ff" :useCenter="1" />
                <skia-arc :cx="110" :cy="100" :r="75" :startAngle="120" :sweepAngle="60" color="#e94560" :useCenter="1" />
                <skia-arc :cx="110" :cy="100" :r="75" :startAngle="180" :sweepAngle="50" color="#4CAF50" :useCenter="1" />
                <skia-arc :cx="110" :cy="100" :r="75" :startAngle="230" :sweepAngle="40" color="#FFD700" :useCenter="1" />

                <skia-circle :cx="110" :cy="100" :r="35" color="#1a1a2e" />
                <skia-text :x="110" :y="105" text="100%" :fontSize="14" color="#FFFFFF" align="center" :bold="1" />

                <skia-rect :x="30" :y="192" :width="8" :height="8" color="#6C63FF" />
                <skia-text :x="42" :y="200" text="33%" :fontSize="9" color="#8888aa" />
                <skia-rect :x="75" :y="192" :width="8" :height="8" color="#00d2ff" />
                <skia-text :x="87" :y="200" text="25%" :fontSize="9" color="#8888aa" />
                <skia-rect :x="116" :y="192" :width="8" :height="8" color="#e94560" />
                <skia-text :x="128" :y="200" text="17%" :fontSize="9" color="#8888aa" />
                <skia-rect :x="157" :y="192" :width="8" :height="8" color="#4CAF50" />
                <skia-text :x="169" :y="200" text="14%" :fontSize="9" color="#8888aa" />
                <skia-rect :x="198" :y="192" :width="8" :height="8" color="#FFD700" />
                <skia-text :x="210" :y="200" text="11%" :fontSize="9" color="#8888aa" />
            </skia-canvas>
        </column>

        {{-- 10. GROUP TRANSFORMS --}}
        <text class="text-2xl font-bold text-[#9b93ff]">Group Transforms</text>

        <skia-canvas class="w-full h-[100] rounded-xl">
            <skia-rect :x="0" :y="0" :width="400" :height="100" color="#1a1a2e" />

            <skia-group :translateX="30" :translateY="20">
                <skia-rect :x="0" :y="0" :width="50" :height="50" color="#6C63FF" :borderRadius="6" />
            </skia-group>
            <skia-text :x="55" :y="88" text="Translate" :fontSize="9" color="#666688" align="center" />

            <skia-group :translateX="145" :translateY="45" :rotate="30">
                <skia-rect :x="-25" :y="-25" :width="50" :height="50" color="#00d2ff" :borderRadius="6" />
            </skia-group>
            <skia-text :x="145" :y="88" text="Rotate" :fontSize="9" color="#666688" align="center" />

            <skia-group :translateX="240" :translateY="45" :scaleX="1.5" :scaleY="0.7">
                <skia-rect :x="-25" :y="-25" :width="50" :height="50" color="#e94560" :borderRadius="6" />
            </skia-group>
            <skia-text :x="240" :y="88" text="Scale" :fontSize="9" color="#666688" align="center" />

            <skia-group :translateX="330" :translateY="15" :opacity="0.5">
                <skia-rect :x="0" :y="0" :width="50" :height="50" color="#4CAF50" :borderRadius="6" />
                <skia-circle :cx="25" :cy="25" :r="15" color="#FFFFFF" />
            </skia-group>
            <skia-text :x="355" :y="88" text="Opacity" :fontSize="9" color="#666688" align="center" />
        </skia-canvas>

        {{-- 11. COLOR ANIMATION --}}
        <text class="text-2xl font-bold text-[#e94560]">Color Animation</text>

        <column class="w-full items-center">
            <skia-canvas class="w-full h-[100] rounded-xl">
                <skia-rect :x="0" :y="0" :width="400" :height="100" color="#1a1a2e" />

                <skia-value name="colorCycle" :from="0" :to="1" :duration="3"
                    :running="1" :loop="1" easing="linear" />

                <skia-circle :cx="60" :cy="50" :r="30"
                    colorStops="#6C63FF,#00d2ff,#4CAF50,#FFD700,#FF9800,#e94560,#6C63FF" bind-color="colorCycle" />
                <skia-circle :cx="140" :cy="50" :r="30"
                    colorStops="#e94560,#6C63FF,#00d2ff,#4CAF50,#FFD700,#FF9800,#e94560" bind-color="colorCycle" />
                <skia-circle :cx="220" :cy="50" :r="30"
                    colorStops="#4CAF50,#FFD700,#FF9800,#e94560,#6C63FF,#00d2ff,#4CAF50" bind-color="colorCycle" />
                <skia-circle :cx="300" :cy="50" :r="30"
                    colorStops="#FFD700,#FF9800,#e94560,#6C63FF,#00d2ff,#4CAF50,#FFD700" bind-color="colorCycle" />

                <skia-text :x="200" :y="95" text="Phase-shifted color cycling" :fontSize="9" color="#666688" align="center" />
            </skia-canvas>
        </column>

        <spacer class="h-[40]" />

    </column>

    <column class="w-full px-4 pt-4 pb-8 gap-6 items-center">

        {{-- React Native Skia "Hello World" — overlapping circles with multiply blend --}}
        <text class="text-2xl font-bold text-indigo-600">Multiply Blend</text>

        <skia-canvas class="w-[256] h-[256] rounded-xl">
            <skia-rect :x="0" :y="0" :width="256" :height="256" color="#FFFFFF" />
            <skia-group blendMode="multiply">
                <skia-circle :cx="84" :cy="84" :r="84" color="cyan" />
                <skia-circle :cx="172" :cy="84" :r="84" color="magenta" />
                <skia-circle :cx="128" :cy="172" :r="84" color="yellow" />
            </skia-group>
        </skia-canvas>

        {{-- Screen blend --}}
        <text class="text-2xl font-bold text-cyan-600">Screen Blend</text>

        <skia-canvas class="w-[256] h-[256] rounded-xl">
            <skia-rect :x="0" :y="0" :width="256" :height="256" color="#000000" />
            <skia-group blendMode="screen">
                <skia-circle :cx="84" :cy="84" :r="84" color="red" />
                <skia-circle :cx="172" :cy="84" :r="84" color="green" />
                <skia-circle :cx="128" :cy="172" :r="84" color="blue" />
            </skia-group>
        </skia-canvas>

        {{-- Overlay blend --}}
        <text class="text-2xl font-bold text-[#e94560]">Overlay Blend</text>

        <skia-canvas class="w-[256] h-[256] rounded-xl">
            <skia-rect :x="0" :y="0" :width="256" :height="256" color="#333333" />
            <skia-group blendMode="overlay">
                <skia-circle :cx="84" :cy="84" :r="84" color="coral" />
                <skia-circle :cx="172" :cy="84" :r="84" color="turquoise" />
                <skia-circle :cx="128" :cy="172" :r="84" color="gold" />
            </skia-group>
        </skia-canvas>

    </column>
</scroll-view>
