<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Rating')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI rating component.'])]
class extends Component {
    public int $ranking1 = 2;

    public int $ranking2 = 2;

    public int $ranking3 = 2;

    public int $ranking4 = 2;
}; ?>

<div class="docs">
    <x-anchor title="Rating" />

    <x-anchor title="Example" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-rating wire:model="ranking1" />

            <x-rating wire:model="ranking2" total="8" />

            <x-rating wire:model="ranking4" class="!mask-heart bg-red-500 rating-lg" />
        @endverbatim
    </x-code>
    <x-code no-render language="php">
        public int $ranking1 = 2;
    </x-code>
</div>
