<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title] class extends Component {
    //
}; ?>

<div class="docs">
    <x-header title="..." with-anchor />
    <x-header title="..." size="text-2xl" class="mt-10 mb-5" with-anchor />

    <p>
        // paragraphs
    </p>

    <x-code>
        @verbatim('docs')
            ...
        @endverbatim
    </x-code>
</div>
