<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function save()
    {
        sleep(1);
    }

    public function save2()
    {
        sleep(1);
    }
}

?>

<div>
<x-markdown>
# Button
</x-markdown>

<x-code class="flex flex-wrap gap-3">
@verbatim
<x-button label="Save" class="btn-outline" />

<x-button label="Save" class="btn-warning" />

<x-button label="Save" icon="o-check" class="btn-success" />

<x-button icon="o-check" class="btn-info text-white">
    With default slot
</x-button>    
@endverbatim
</x-code>

<x-markdown>
### Spinners

</x-markdown>

<x-code class="grid">
@verbatim
<!-- It automatically targets to self `wire:click` action  -->
<x-button label="Self target" spinner wire:click="save" class="btn-warning" />

<hr class="my-10">

<x-form wire:submit="save2">
    <x-input label="Name" />

    <x-slot:actions>
        <!-- Set custom target as `save2` -->
        <x-button label="Custom target" spinner="save2" type="submit" class="btn-primary" />
    </x-slot:actions>
</x-form>

@endverbatim
</x-code>

</div>