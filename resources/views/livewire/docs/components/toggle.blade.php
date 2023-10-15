<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Toggle')] class extends Component {
    public bool $item1 = true;

    public bool $item2 = false;

    public bool $item3 = false;
}

?>

<div class="docs">
    <x-anchor title="Toggle" />

    <x-code class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-toggle label="Left" wire:model="item1" />
            <hr />

            <x-toggle label="Right" wire:model="item2" right />
            <hr />

            <x-toggle label="Right Tight" wire:model="item3" class="toggle-warning" right tight />
            <hr />

            <x-button label="Switch with $wire" @click="$wire.item3 = !$wire.item3" class="btn-outline" />
        @endverbatim
    </x-code>
</div>
