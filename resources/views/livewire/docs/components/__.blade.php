<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title(fill_here)]
#[Layout('components.layouts.app', ['description' => fill_here])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="..." />
    <x-anchor title="..." size="text-xl" class="mt-14" />

    <p>
        // paragraphs
    </p>

    <x-code-example>
        @verbatim('docs')
            ...
        @endverbatim
    </x-code-example>
</div>
