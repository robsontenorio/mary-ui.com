<?php

use Livewire\Volt\Component;

new class extends Component
{
    public bool $openDrawer = false;
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
</x-markdown>

<x-code class="flex gap-5">
@verbatim
<!-- Note `wire:model` -->
<x-drawer wire:model="openDrawer" class="w-1/3 p-5" >
    With Livewire

    <hr class="my-5"/>

    <!-- Livewire: Server side  -->
    <x-button label="Close (server)" wire:click="$toggle('openDrawer')" class="btn-primary"  />

    <!-- Livewire: Client side (no http request)  -->
    <x-button label="Close (client)" @click="$wire.openDrawer = false" class="btn-warning" />
</x-drawer>

<!-- Livewire: Server side  -->
<x-button label="Open (server)" wire:click="$toggle('openDrawer')" class="btn-primary" />

<!-- Livewire: Client side (no http request)  -->
<x-button label="Open(client)" @click="$wire.openDrawer = true" class="btn-warning" />
@endverbatim
</x-code>


</div>