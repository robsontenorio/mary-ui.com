<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Tabs')] class extends Component {
    public string $selectedTab = 'tricks-tab';
}

?>

<div class="docs">
    <x-header title="Tabs" with-anchor />

    <x-code>
        @verbatim('docs')
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

    <x-header title="With Livewire" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            {{-- Note `wire:model` --}}
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
