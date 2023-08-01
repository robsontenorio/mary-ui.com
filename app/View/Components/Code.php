<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Code extends Component
{
    public function __construct($language = 'html')
    {
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
        <!-- Fix identation -->
        @php 
            $x = (string) Str::of($slot)->prepend('    ');
        @endphp

        <div {{ $attributes->class(["rounded-md bg-gray-100 p-5"]) }} >            
                @php  echo Blade::render($x)  @endphp
        </div>
        <pre><x-torchlight-code language='html' :contents="$x" /></pre>
        HTML;
    }
}
