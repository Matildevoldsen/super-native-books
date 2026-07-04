<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

/**
 * Live perf HUD demo. Stats come from `nativephp_last_publish_stats()`
 * — BENCH_C-style numbers from the most recent publish of this screen.
 *
 *   - Tap "+1" → counter changes → only that cell + ancestors emit FULL;
 *     the static rows below stay as REUSE markers (memo on).
 *   - Toggle Memo OFF → every node re-emits FULL; byte count jumps.
 */
class PerfShowdown extends NativeComponent
{
    public int $counter = 0;

    private const ROW_COUNT = 200;

    public function navTitle(): string
    {
        return 'Memo Performance';
    }

    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->subtitle('Real numbers from the C extension');
    }

    public function tap(): void
    {
        $this->counter++;
    }

    public function tap10(): void
    {
        $this->counter += 10;
    }

    public function toggleMemo(): void
    {
        $flags = nativephp_runtime_flags();
        nativephp_set_runtime_flags($flags ^ 0x02);
    }

    public function render(): View
    {
        $stats = function_exists('nativephp_last_publish_stats')
            ? nativephp_last_publish_stats()
            : [
                'node_count' => 0, 'full_count' => 0, 'reuse_count' => 0,
                'flat_size' => 0, 'was_skip' => false,
                'build_ms' => 0.0, 'total_ms' => 0.0,
                'runtime_flags' => function_exists('nativephp_runtime_flags')
                    ? nativephp_runtime_flags()
                    : 0,
            ];

        $memoOn = ((int) $stats['runtime_flags'] & 0x02) !== 0;

        $rows = [];
        for ($i = 0; $i < self::ROW_COUNT; $i++) {
            $rows[] = [
                'key' => "row-{$i}",
                'label' => "row #{$i}",
                'value' => sprintf('%.2f ms', $i * 0.01),
            ];
        }

        return view('native.perf-showdown', [
            'stats' => $stats,
            'flatBytes' => $this->formatBytes((int) $stats['flat_size']),
            'memoOn' => $memoOn,
            'counter' => $this->counter,
            'rowCount' => self::ROW_COUNT,
            'rows' => $rows,
        ]);
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes < 1024) {
            return $bytes.' B';
        }
        if ($bytes < 1024 * 1024) {
            return number_format($bytes / 1024, 1).' KB';
        }

        return number_format($bytes / 1024 / 1024, 2).' MB';
    }
}
