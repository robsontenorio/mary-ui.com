<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Rating')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI rating component.'])]
class extends Component {
    public int $ranking0 = 0;

    public int $ranking1 = 1;

    public int $ranking2 = 2;

    public int $ranking3 = 3;

    public int $ranking4 = 4;
}; ?>

<div class="docs">
    <x-anchor title="Rating" />

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    <p>
        It controls the rating based on a integer number. For "not rated" set its model value as "0".
    </p>

    <x-code-example class="grid gap-5">
        @verbatim('docs')
            {{-- Not rated --}}
            {{-- public int $ranking0 = 0; --}}
            <x-rating wire:model="ranking0" />

            <x-rating wire:model="ranking1" class="bg-warning" total="8" />

            <x-rating wire:model="ranking2" class="!mask-circle" />

            <x-rating wire:model="ranking3" class="!mask-diamond bg-accent" />

            <x-rating wire:model="ranking4" class="!mask-heart bg-secondary rating-xl" />

        @endverbatim
    </x-code-example>
</div>
