<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CodeExample extends Component
{
    public function __construct(
        public string $language = 'blade',
        public ?bool $noRender = false,
        public ?bool $sideBySide = false,
        public ?bool $invert = false,
        public ?string $renderColSpan = "12",
        public ?string $codeColSpan = "12"
    ) {
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
        @php
            $x = (string) Str::of($slot);

            // The @verbatim adds some weird indentation.
            // So we hack it by looking for keyword ('docs') to know when @verbatim is used.
            // Then, we handle unneeded extra white spaces.

            if (Str::contains($x, "('docs')")) {
                $x = Str::replace("('docs')", "        ", $x);
                $x = Str::replaceFirst("        \n", "", $x);
                $x = Str::replaceFirst("        ", "", $x);
            }
        @endphp

        <div x-classes="lg:col-span-3 lg:col-span-4 lg:col-span-5 lg:col-span-6 lg:col-span-7 lg:col-span-8 lg:col-span-9"></div>
        <div @class(["grid gap-5 grid-cols-1 lg:grid-cols-12" => $sideBySide])>
        @if(!$noRender)
            <div @class(["lg:col-span-$renderColSpan" => $sideBySide, "order-last" => $invert])>
                <x-mockup {{ $attributes }}>
                    <?php echo Blade::render($x);  ?>
                </x-mockup>
            </div>
        @endif

        <div wire:ignore @class(["lg:col-span-$codeColSpan" => $sideBySide])>
            <pre><x-torchlight-code :language="$language">
                {!! $x !!}
            </x-torchlight-code></pre>
        </div>
        </div>
        HTML;
    }
}
