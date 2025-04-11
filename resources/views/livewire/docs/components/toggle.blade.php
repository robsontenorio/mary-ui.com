<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Toggle')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI toggle component with builtin validation support.'])]
class extends Component {
    public bool $item1 = true;

    public bool $item2 = false;

    public bool $item3 = true;

    public bool $item4 = true;
}

?>

<div class="docs">
    <x-anchor title="Toggle" />

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            <x-toggle label="Left" wire:model="item1" />

            <x-toggle label="Left" wire:model="item1" hint="Please, turn it off now!" />
            <hr class="border-base-300" /> <!-- [tl! .docs-hide] -->

            <x-toggle label="Right" wire:model="item2" right />

            <x-toggle label="Right" wire:model="item2" hint="Please, turn it off now!" right />
            <hr class="border-base-300" /><!-- [tl! .docs-hide] -->

            <x-toggle wire:model="item3" class="self-start">
                <x-slot:label>
                    This is <br>a very <br> long line.
                </x-slot:label>
            </x-toggle>
        @endverbatim
    </x-code-example>
</div>
