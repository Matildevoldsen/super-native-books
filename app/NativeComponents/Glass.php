<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\Element;
use Native\Mobile\Edge\NativeComponent;

class Glass extends NativeComponent
{
    public function navTitle(): string
    {
        return 'Glass';
    }

    public function render(): View
    {
        return view('native.glass');
    }
}
