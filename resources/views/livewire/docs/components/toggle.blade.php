<?php

use Livewire\Volt\Component;

new class extends Component
{
    public bool $item1 = true;

    public bool $item2 = false;
}

?>

<div>
<x-markdown>
# Toggle
</x-markdown>

<x-code class="flex gap-5 justify-center">
<div class="w-96 bg-base-200 p-5 rounded-lg">
    @verbatim
    <x-toggle label="Option 1" wire:model="item1" />
    <hr class="my-5" />

    <x-toggle label="Option 2" wire:model="item2" class="toggle-warning" right />
    <hr class="my-5" />    

    <x-button label="Switch" @click="$wire.item2 = !$wire.item2"  class="btn-outline"/>
    @endverbatim
</div>
</x-code>

</div>