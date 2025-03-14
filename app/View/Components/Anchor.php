<?php
namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Anchor extends Component
{
    public string $anchor = '';

    public function __construct(
        public ?string $title = null,
        public ?string $size = 'text-3xl',
    ) {
        $this->anchor = Str::slug($title);
    }

    public function render(): View|Closure|string
    {
        return <<<'HTML'
                <h2 id="{{ $anchor }}" {{ $attributes->class(["mb-5 mary-header-anchor $size font-semibold"]) }}">
                    <a href="#{{ $anchor }}">{{ $title }}</a>
                </h2>
                HTML;
    }
}
