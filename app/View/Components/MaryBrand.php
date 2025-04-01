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
             <div class="flex items-center gap-1">
                <div class="font-black text-2xl underline decoration-pink-400  decoration-[0.15rem]">maryUI</div>
                <div>
                    <x-icon name="far.heart" class="w-6 h-6 text-pink-400" />
                </div>
                <!--                bg-gradient-to-r from-purple-500 via-pink-400 to-pink-500 bg-clip-text text-transparent-->
            </div>
        HTML;
    }
}
