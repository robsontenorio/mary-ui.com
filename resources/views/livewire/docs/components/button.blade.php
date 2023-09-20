<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Button')] class extends Component
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
<x-button label="Hi!" class="btn-outline" />

<x-button label="Hello" icon-right="o-x-circle" class="btn-warning" />

<x-button label="There" icon="o-check" class="btn-success" />

<x-button class="btn-primary ">
    With default slot
</x-button>    

<x-button icon="o-user" class="btn-circle" />

<x-button icon="o-user" class="btn-circle btn-outline" />

<x-button icon="o-user" class="btn-circle btn-ghost" />

<x-button icon="o-user" class="btn-square" />
@endverbatim
</x-code>

<x-markdown>
### Spinners

</x-markdown>

<x-code class="grid grid-cols-1 lg:grid-cols-2 gap-8">
@verbatim
<!-- It automatically targets to self `wire:click` action  -->
<x-button label="Self target" wire:click="save" icon-right="o-lock-closed" spinner />

<x-form wire:submit="save2">
    <x-input label="Name" inline />
    <x-slot:actions>
        <!-- No target spinner -->
        <x-button label="No target" />

        <!-- Target is `save2` -->
        <x-button label="Custom target" type="submit" class="btn-primary" spinner="save2" />
    </x-slot:actions>
</x-form>

@endverbatim
</x-code>

</div>