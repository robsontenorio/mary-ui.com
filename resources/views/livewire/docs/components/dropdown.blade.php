<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function delete()
    {
        sleep(1);
    }
}

?>

<div>

<x-markdown>
# Dropdown
</x-markdown>

<x-alert icon="o-light-bulb" class="markdown mb-10">
    Dropdowns <strong>are not intended</strong> to be paired with `wire:model`. Just use <a href="/docs/components/select" wire:navigate>Select</a> component.
</x-alert>


<x-code class="pb-40 flex justify-between">
@verbatim
<x-dropdown label="Options">
    <!-- `x-dropdown` is a `menu`, so just use `x-menu-item`  -->    
    <x-menu-item title="Nothing" icon="o-archive-box" />
    <x-menu-item title="Delete - sleep 1s" icon="o-trash" wire:click="delete"  />    
    <x-menu-item title="Navigate do Install docs" icon="o-arrow-right" link="/docs/installation"  />
</x-dropdown>

<!-- Use `right` if you are positioning dropdown on right side of screen -->    
<x-dropdown label="Hello" class="btn-warning" right>
    <x-menu-item title="It should align correctly on right side" icon="o-archive-box"  />
</x-dropdown>
@endverbatim
</x-code>

</div>