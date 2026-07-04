<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\Element;
use Native\Mobile\Edge\Elements\Column;
use Native\Mobile\Edge\Elements\Pressable;
use Native\Mobile\Edge\Elements\Row;
use Native\Mobile\Edge\Elements\ScrollView;
use Native\Mobile\Edge\Elements\Spacer;
use Native\Mobile\Edge\Elements\Text;
use Native\Mobile\Edge\Layouts\Builders\NavBarOptions;
use Native\Mobile\Edge\NativeComponent;

/**
 * Phase 2 verification screen — toggles NPHP_FLAG_SUBTREE_MEMO and renders
 * a list big enough to see REUSE pay off in the BENCH_C logs.
 *
 * How to read the test:
 *   1. Tap "+1" with memo OFF — every publish re-serializes all rows. BENCH_C
 *      flat bytes ≈ rows × 161.
 *   2. Tap "Toggle memo" to flip NPHP_FLAG_SUBTREE_MEMO on.
 *   3. Tap "+1" again — the first publish with memo on is still all-FULL
 *      (hash store was empty). BENCH_C flat unchanged.
 *   4. Tap "+1" a second time. Only the counter row's content changed;
 *      every other row is unchanged → emits REUSE. BENCH_C flat should
 *      drop dramatically (the REUSE marker still takes 161 bytes per
 *      node, but its descendants are absent from the buffer).
 *
 * Watch the BENCH_C `element_publish:` line in the logs for `flat=...` and
 * `nodes=...`. With memo on and most of the tree unchanged, `flat` shrinks
 * but `nodes` stays roughly the same (each REUSE still occupies one node
 * slot — what we save is its children).
 */
class Phase2MemoTest extends NativeComponent
{
    /** Increments on each "+1" press — drives a per-publish state change. */
    public int $counter = 0;

    /** Cached runtime-flag bitfield. Re-read on every render so the toggle
     *  reflects the current global state. */
    private int $currentFlags = 0;

    /** Row count for the static list — large enough that REUSE matters but
     *  small enough not to overwhelm the simulator's parse. */
    private const ROW_COUNT = 60;

    public function navTitle(): string
    {
        return 'Phase 2 — Memo';
    }

    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->displayMode('large')
            ->subtitle('REUSE-marker verification');
    }

    public function increment(): void
    {
        $this->counter++;
    }

    public function decrement(): void
    {
        if ($this->counter > 0) {
            $this->counter--;
        }
    }

    /**
     * Toggle the NPHP_FLAG_SUBTREE_MEMO bit on the region. Effect kicks in
     * on the next publish (this method's callback returns, runLoop loops,
     * memoizedToArray() consults the new flag value).
     */
    public function toggleMemo(): void
    {
        $now = nativephp_runtime_flags();
        $next = $now ^ 0x02; // flip bit 1
        nativephp_set_runtime_flags($next);
        error_log(sprintf(
            'Phase2MemoTest: memo flipped 0x%08x → 0x%08x',
            $now,
            $next,
        ));
    }

    public function backToLauncher(): void
    {
        $this->back();
    }

    public function render(): Element
    {
        $this->currentFlags = nativephp_runtime_flags();
        $memoOn = ($this->currentFlags & 0x02) !== 0;

        $root = Column::make()->fillWidth()->padding(16)->gap(12);

        $root->addChild(
            Pressable::make(
                Row::make(
                    Text::make('<')->fontSize(20)->fontWeight(7)->color('#94A3B8'),
                    Spacer::make()->width(8),
                    Text::make('Back')->fontSize(15)->color('#94A3B8'),
                )->gap(0)
            )->onPress('backToLauncher')->padding(4, 0, 4, 0)
        );

        // ── Header / toggle ──
        $root->addChild(
            Text::make('Phase 2 verification')
                ->fontSize(22)->fontWeight(7)->color('#F1F5F9')
        );
        $root->addChild(
            Text::make('Watch BENCH_C `flat=...` in the logs as you tap.')
                ->fontSize(13)->color('#94A3B8')
        );

        $root->addChild($this->renderFlagsCard($memoOn));

        // ── Counter ──
        $root->addChild(
            Row::make(
                Pressable::make(
                    Text::make('-1')->fontSize(16)->fontWeight(7)->color('#FFFFFF')
                )->onPress('decrement')->bg('#475569')->borderRadius(8)->padding(10, 18),
                Spacer::make()->width(12),
                Text::make((string) $this->counter)
                    ->fontSize(28)->fontWeight(7)->color('#38BDF8'),
                Spacer::make()->width(12),
                Pressable::make(
                    Text::make('+1')->fontSize(16)->fontWeight(7)->color('#FFFFFF')
                )->onPress('increment')->bg('#0EA5E9')->borderRadius(8)->padding(10, 18),
            )->fillWidth()->alignItems(2)->justifyContent(1)
        );

        // ── Big keyed list ──
        // Keys are stable per Phase 1 — every row keeps its id across renders,
        // so Phase 2's contentHash check can detect unchanged rows and emit
        // REUSE markers. Without keys, every row would get a fresh positional
        // id and never qualify as unchanged.
        $list = Column::make()->fillWidth()->gap(2)->key('rows-container');
        for ($i = 0; $i < self::ROW_COUNT; $i++) {
            // Static rows — content never changes. With memo on, these
            // should all be REUSE on every publish after the first.
            $list->addChild(
                Row::make(
                    Text::make("row #{$i}")->fontSize(13)->color('#CBD5E1'),
                    Spacer::make()->flexGrow(1),
                    Text::make(sprintf('%.2f ms', $i * 0.1))
                        ->fontSize(12)->color('#64748B'),
                )
                ->key("row-{$i}")
                ->fillWidth()->padding(8, 12)->bg('#1E293B')->borderRadius(6)
            );
        }
        $root->addChild($list);

        $root->addChild(Spacer::make()->height(24));

        return ScrollView::make()
            ->fill()->safeArea()->bg('#0F172A')
            ->addChild($root);
    }

    private function renderFlagsCard(bool $memoOn): Element
    {
        $statusColor = $memoOn ? '#10B981' : '#64748B';
        $statusLabel = $memoOn ? 'MEMO ON' : 'MEMO OFF';

        $card = Column::make()
            ->fillWidth()->padding(12)->gap(8)
            ->bg('#1E293B')->borderRadius(10);

        $card->addChild(
            Row::make(
                Text::make($statusLabel)
                    ->fontSize(11)->fontWeight(7)->color('#FFFFFF')
                    ->bg($statusColor)->borderRadius(4)->padding(2, 8),
                Spacer::make()->width(10),
                Text::make(sprintf('runtime_flags = 0x%08x', $this->currentFlags))
                    ->fontSize(12)->color('#CBD5E1')->fontWeight(6),
            )->fillWidth()->alignItems(2)
        );

        $card->addChild(
            Pressable::make(
                Text::make('Toggle memo')
                    ->fontSize(13)->fontWeight(6)->color('#0F172A')
            )
                ->onPress('toggleMemo')
                ->bg('#F59E0B')->borderRadius(6)->padding(8, 14)
        );

        $card->addChild(
            Text::make(
                $memoOn
                    ? 'REUSE markers active. Static rows below should not re-serialize on +1.'
                    : 'All nodes emit FULL. Every +1 re-serializes the full tree.'
            )->fontSize(11)->color('#94A3B8')
        );

        return $card;
    }
}
