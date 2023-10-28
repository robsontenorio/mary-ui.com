<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title(fill_here)]
#[Layout('components.layouts.app', ['description' => fill_here])]
class extends Component
{
class extends Component
{
    //
}; ?>

<div class="docs">
    <x-anchor title="..." />
    <x-anchor title="..." size="text-2xl" class="mt-10 mb-5" />

    <p>
        // paragraphs
    </p>

    <x-code>
        @verbatim('docs')
            ...
        @endverbatim
    </x-code>
</div>
