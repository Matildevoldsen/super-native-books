<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Attributes\Computed;
use Native\Mobile\Attributes\Lazy;
use Native\Mobile\Edge\NativeComponent;

#[Lazy]
class ReactivityDemo extends NativeComponent
{
    public int $count = 0;

    public function navTitle(): string
    {
        return 'Reactivity';
    }

    public function mount(): void
    {
        sleep(2);
    }

    protected function placeholder(): View
    {
        return view('native.reactivity-demo-placeholder');
    }

    /** #[Computed] — derived from $count, recomputed when state changes. */
    #[Computed]
    public function doubled(): int
    {
        return $this->count * 2;
    }

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }

    public function render(): View
    {
        return view('native.reactivity-demo');
    }
}
