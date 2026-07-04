<?php

namespace App\NativeComponents;

use Illuminate\View\View;
use Native\Mobile\Edge\NativeComponent;
use Native\Mobile\Facades\Camera;

class Counter extends NativeComponent
{
    public $count = 0;

    public $photo = '';

    public function navTitle(): string
    {
        return 'Counter';
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function testCamera()
    {
        Camera::getPhoto()->photoTaken(function ($event) {
            $this->photo = $event->path;
        });

    }

    public function render(): View
    {
        return view('native.counter');
    }
}
