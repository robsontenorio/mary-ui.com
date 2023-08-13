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

You can direct open a drawer by using native HTML `<label>` while referencing drawer `id`. It closes when you click outside.

</x-markdown>

<x-code class="flex gap-5">
@verbatim
<x-drawer id="my-drawer" class="bg-purple-300" >
    Content left auto width.
</x-drawer>

<x-drawer id="my-drawer2" class="w-1/3" right>
    <x-card title="Settings" subtitle="Main profile">
        Content right with fixed width and Card.
    </x-card>
</x-drawer>

<x-drawer wire:model="openDrawer" class="bg-red-300" >
    With `wire:model`
</x-drawer>

<!-- HTML: Just reference correct drawer ID  -->
<label for="my-drawer" class="btn btn-primary capitalize">Open left (HTML)</label>
<label for="my-drawer2" class="btn btn-warning capitalize">Open right (HTML)</label>

<!-- Livewire: Server side  -->
<x-button label="Livewire (server)" wire:click="$toggle('openDrawer')" class="btn-info" />

<!-- Livewire: Client side  -->
<x-button label="Livewire (client)" @click="$wire.openDrawer = true" class="btn-error" />


@endverbatim
</x-code>


</div>