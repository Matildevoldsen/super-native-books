<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\CallbackRegistry;
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
 * Phase 1 verification screen — runs the keyed-identity tests on-device.
 *
 * The whole point of Phase 1 is that `->key($domainId)` makes node ids
 * stable across renders even when siblings reorder. Tinker can't drive
 * the custom on-device libphp.a, so we run the same checks inside a
 * demo screen and render their results.
 *
 * Tests:
 *   1. Unkeyed children get sequential positional ids (legacy behavior).
 *   2. Keyed children get hash ids (large, non-sequential).
 *   3. Reordering keyed children preserves their ids (the Phase 1 win).
 */
class Phase1KeyTest extends NativeComponent
{
    public function navTitle(): string
    {
        return 'Phase 1 — Keys';
    }

    public function navigationOptions(): ?NavBarOptions
    {
        return NavBarOptions::make()
            ->displayMode('large')
            ->subtitle('Stable keyed-identity verification');
    }

    public function backToLauncher(): void
    {
        $this->back();
    }

    public function render(): Element
    {
        $results = $this->runTests();

        $column = Column::make()->fillWidth()->padding(16)->gap(16);

        $column->addChild(
            Pressable::make(
                Row::make(
                    Text::make('<')->fontSize(20)->fontWeight(7)->color('#94A3B8'),
                    Spacer::make()->width(8),
                    Text::make('Back')->fontSize(15)->color('#94A3B8'),
                )->gap(0)
            )->onPress('backToLauncher')->padding(4, 0, 4, 0)
        );

        $column->addChild(
            Text::make('Phase 1 verification')
                ->fontSize(22)->fontWeight(7)->color('#F1F5F9')
        );
        $column->addChild(
            Text::make('Calls Element::toArray() three times and inspects the ids.')
                ->fontSize(13)->color('#94A3B8')
        );

        foreach ($results as $r) {
            $column->addChild($this->renderResultCard($r));
        }

        $allPassed = array_reduce($results, fn ($carry, $r) => $carry && $r['pass'], true);
        $column->addChild(
            Text::make($allPassed ? 'All tests passed.' : 'One or more tests failed — check ids above.')
                ->fontSize(15)
                ->fontWeight(6)
                ->color($allPassed ? '#10B981' : '#EF4444')
        );
        $column->addChild(Spacer::make()->height(24));

        return ScrollView::make()
            ->fill()->safeArea()->bg('#0F172A')
            ->addChild($column);
    }

    /**
     * Runs the three Phase 1 checks and returns a normalized result
     * list. Pure PHP — no native calls, no side effects on the wider
     * runtime — so it's safe to call from render() every frame.
     */
    private function runTests(): array
    {
        $results = [];

        // ── Test 1: unkeyed → sequential positional ids ──
        $reg = new CallbackRegistry;
        $t1 = Column::make(
            Text::make('A'),
            Text::make('B'),
            Text::make('C'),
        )->toArray($reg);
        $unkeyedIds = array_map(fn ($c) => $c['id'], $t1['children']);
        // Expect [2, 3, 4] — root is 1, children fall to $nextId++.
        $results[] = [
            'name' => 'Test 1 — unkeyed children get sequential ids',
            'detail' => 'Three unkeyed Text children under unkeyed Column. Expect [2, 3, 4].',
            'observed' => 'root='.$t1['id'].', children=['.implode(', ', $unkeyedIds).']',
            'pass' => $t1['id'] === 1 && $unkeyedIds === [2, 3, 4],
        ];

        // ── Test 2: keyed children → hash ids (non-sequential, > 2^16) ──
        $reg = new CallbackRegistry;
        $t2 = Column::make(
            Text::make('A')->key('item-a'),
            Text::make('B')->key('item-b'),
        )->toArray($reg);
        $keyedIds = array_map(fn ($c) => $c['id'], $t2['children']);
        $hashShape = array_reduce(
            $keyedIds,
            fn ($carry, $id) => $carry && $id > 0xFFFF && $id <= 0xFFFFFFFF,
            true,
        );
        $results[] = [
            'name' => 'Test 2 — keyed children get hash ids',
            'detail' => "Two Text children with ->key('item-a') and ->key('item-b').",
            'observed' => 'root='.$t2['id'].', children=['.implode(', ', $keyedIds).']',
            'pass' => $t2['id'] === 1
                && $hashShape
                && $keyedIds[0] !== $keyedIds[1],
        ];

        // ── Test 3: reordering keyed children preserves ids ──
        // Phase 1 win: same key → same id regardless of position.
        $reg = new CallbackRegistry;
        $t3 = Column::make(
            Text::make('B')->key('item-b'),
            Text::make('A')->key('item-a'),
        )->toArray($reg);
        $reorderedIds = array_map(fn ($c) => $c['id'], $t3['children']);
        // 'item-b' was at index 1 in Test 2, now at index 0. Same id.
        $itemBSame = $reorderedIds[0] === $keyedIds[1];
        $itemASame = $reorderedIds[1] === $keyedIds[0];
        $results[] = [
            'name' => 'Test 3 — reorder preserves ids',
            'detail' => 'Same two keys as Test 2, swapped order. Each id follows its key.',
            'observed' => "before=[item-a:{$keyedIds[0]}, item-b:{$keyedIds[1]}], "
                ."after=[item-b:{$reorderedIds[0]}, item-a:{$reorderedIds[1]}]",
            'pass' => $itemBSame && $itemASame,
        ];

        return $results;
    }

    private function renderResultCard(array $r): Element
    {
        $passColor = $r['pass'] ? '#10B981' : '#EF4444';
        $passLabel = $r['pass'] ? 'PASS' : 'FAIL';

        $card = Column::make()
            ->fillWidth()->padding(14)->gap(6)
            ->bg('#1E293B')->borderRadius(10);

        $card->addChild(
            Row::make(
                Text::make($passLabel)
                    ->fontSize(11)->fontWeight(7)->color('#FFFFFF')
                    ->bg($passColor)->borderRadius(4)->padding(2, 8),
                Spacer::make()->width(10),
                Text::make($r['name'])
                    ->fontSize(14)->fontWeight(6)->color('#F1F5F9'),
            )->fillWidth()->alignItems(2)
        );

        $card->addChild(
            Text::make($r['detail'])->fontSize(12)->color('#94A3B8')
        );
        $card->addChild(
            Text::make($r['observed'])->fontSize(12)->color('#CBD5E1')
        );

        return $card;
    }
}
