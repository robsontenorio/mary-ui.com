<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Code extends Component
{
    public function __construct(
        public string $language = 'html',
        public ?bool $noRender = false
    ) {

    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
        <!-- Fix identation -->
        @php 
            $x = (string) Str::of($slot);
        @endphp

        @if(!$noRender)
            <x-mockup {{ $attributes }}>
                <?php echo Blade::render($x);  ?>
            </x-mockup>
        @endif
        <x-markdown theme="material-theme-palenight">
        ```{{ $language }}
        {!! $x !!}
        ```
        </x-markdown>
        HTML;
    }
}
