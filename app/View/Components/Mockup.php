<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Mockup extends Component
{
    public function __construct(

    ) {

    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
            <div class="mockup-browser border bg-base-300">
                <div class="mockup-browser-toolbar"></div>
                <div class="p-8 bg-base-100">
                    {{ $slot }}                
                </div>
            </div>
        HTML;
    }
}
