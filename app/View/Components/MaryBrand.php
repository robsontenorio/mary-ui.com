<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MaryBrand extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
            <span
                class="font-extrabold text-4xl bg-gradient-to-r from-amber-500 to-pink-500 bg-clip-text text-transparent">
                                            
                mary
            </span>
            <span class="ml-3 text-gray-500 text-sm font-medium">Laravel blade components</span>
        HTML;
    }
}
