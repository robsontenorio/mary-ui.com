<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Tabs')] class extends Component
{
    public string $selectedTab = 'tricks-tab';
}

?>
<div>
<x-markdown>
# Tabs
</x-markdown>

<x-code>
@verbatim
<x-tabs selected="users-tab">
    <x-tab name="users-tab" label="Users" icon="o-users">
        <div>Users</div>
    </x-tab>
    <x-tab name="tricks-tab" label="Tricks" icon="o-sparkles">
        <div>Tricks</div>
    </x-tab>
    <x-tab name="musics-tab" label="Musics" icon="o-musical-note">
        <div>Musics</div>
    </x-tab>
</x-tabs>
@endverbatim
</x-code>

<x-markdown>
### With Livewire
</x-markdown>

<x-code>
@verbatim
<!-- Note `wire:model` -->
<x-tabs wire:model="selectedTab">
    <x-tab name="users-tab" label="Users" icon="o-users">
        <div>Users</div>
    </x-tab>
    <x-tab name="tricks-tab" label="Tricks" icon="o-sparkles">
        <div>Tricks</div>
    </x-tab>
    <x-tab name="musics-tab" label="Musics" icon="o-musical-note">
        <div>Musics</div>
    </x-tab>
</x-tabs>

<hr class="my-5">

<x-button label="Change to Musics" @click="$wire.selectedTab = 'musics-tab'" />
@endverbatim
</x-code>


</div>