<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Tabs')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI tabs component with icons and dynamic selection.'])]
class extends Component {
    public string $selectedTab = 'tricks-tab';
}

?>

<div class="docs">
    <x-anchor title="Tabs" />

    <x-anchor title="Usage" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
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

    <x-anchor title="Slots" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Use slots to customize the tab label.
    </p>
    <x-code>
        @verbatim('docs')
            <x-tabs wire:model="selectedTab">
                <x-tab name="users-tab">
                    <x-slot:label>  {{-- [tl! highlight:3] --}}
                        Users
                        <x-badge value="3" class="badge-primary" />
                    </x-slot:label>

                    <div>Users</div>
                </x-tab>
                <x-tab name="tricks-tab" label="Tricks">
                    <div>Tricks</div>
                </x-tab>
                <x-tab name="musics-tab" label="Musics">
                    <div>Musics</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code>

</div>
