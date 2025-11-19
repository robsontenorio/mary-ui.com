<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Torchlight\Engine\Engine;

class CodeExample extends Component
{
    public function __construct(
        public string $language = 'blade',
        public ?bool $noRender = false,
        public ?bool $sideBySide = false,
        public ?bool $invert = false,
        public ?string $renderColSpan = "12",
        public ?string $codeColSpan = "12",
        public ?string $theme = "material-theme-palenight",
    ) {
    }

    public function highlight(string $code): string
    {
        return cache()->rememberForever(md5($code), function () use ($code) {
            return new Engine()->codeToHtml($code, $this->language, $this->theme);
        });
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
        @php
            $code = (string) $slot;

            // Remove the `('docs')` string from @verbatim('docs')
            $code = Str::replace("('docs')\n", "", $code);

            // Get the first line indentation ammount
            $firstLine = Str::of($code)->explode("\n")->first(fn ($l) => trim($l) !== '');
            preg_match('/^\s*/', $firstLine, $m);
            $indent = strlen($m[0]);

            // Remove the amount of identation, once per line
            $code = preg_replace('/^ {' . $indent . '}/m', '', $code);
        @endphp

        <div x-classes="lg:col-span-3 lg:col-span-4 lg:col-span-5 lg:col-span-6 lg:col-span-7 lg:col-span-8 lg:col-span-9"></div>
        <div @class(["grid gap-5 grid-cols-1 lg:grid-cols-12" => $sideBySide])>
            @if(!$noRender)
                <div @class(["lg:col-span-$renderColSpan" => $sideBySide, "order-last" => $invert])>
                    <x-mockup {{ $attributes }}>
                        <?php echo Blade::render($code);  ?>
                    </x-mockup>
                </div>
            @endif

            <div wire:ignore @class(["lg:col-span-$codeColSpan" => $sideBySide])>
                {!! $highlight($code) !!}
            </div>
        </div>
        HTML;
    }
}
