<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Drawer')] class extends Component
{
    public bool $showDrawer = false;
}

?>

<div>
<x-markdown>
# Drawer

### Native HTML

You can directly open a drawer by using native HTML `<label>` while referencing same drawer `id`. It closes when you click outside.
</x-markdown>

<x-code class="flex gap-5">
@verbatim
<x-drawer id="my-drawer" class="bg-blue-300" >
    Content left auto width.
</x-drawer>

<x-drawer id="my-drawer2" class="w-1/3" right>
    <x-card title="Settings" subtitle="Main profile">
        Content right with fixed width and Card.
    </x-card>
</x-drawer>

<!-- HTML: Just reference correct drawer ID  -->
<label for="my-drawer" class="btn btn-primary capitalize">Open left</label>
<label for="my-drawer2" class="btn btn-warning capitalize">Open right</label>
@endverbatim
</x-code>

<x-markdown>
### With Livewire

**You don't need** `id="xxx"`.  

You can toggle visibility with Livewire or Alpine. In both cases you need `wire:model`. In the following example, we consider you have declared:

<x-code no-render language="php">
public bool $showDrawer = false;
</x-code>
<br>
</x-markdown>

<x-code class="flex gap-5">
@verbatim
<!-- Note `wire:model` -->
<x-drawer wire:model="showDrawer" class="w-1/3 p-5" >
    With Livewire

    <hr class="my-5"/>

    <!-- Livewire: Server side  -->
    <x-button label="Livewiew (server)" wire:click="$toggle('showDrawer')" class="btn-primary"  />
    <!-- Alpine: Client side (no http request)  -->
    <x-button label="Alpine (client)" @click="$wire.showDrawer = false" class="btn-warning" />
</x-drawer>

<!-- Livewire: Server side  -->
<x-button label="Livewire (server)" wire:click="$toggle('showDrawer')" class="btn-primary" />
<!-- Alpine: Client side (no http request)  -->
<x-button label="Alpine (client)" @click="$wire.showDrawer = true" class="btn-warning" />
@endverbatim
</x-code>


</div>