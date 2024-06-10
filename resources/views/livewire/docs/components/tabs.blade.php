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

    <x-anchor title="Customisation" size="text-2xl" class="mt-10 mb-5" />

    <p>
       Add custom classes to the x-tabs component
    </p>
    <x-code>
        @verbatim('docs')
            <x-tabs label-class="font-semibold" label-div-class="flex overflow-x-auto w-full" active-class='bg-primary'
                   wire:model="selectedTab"
                   class="!border-none w-full">
                <x-tab id="all-tab" name="all-tab" label="All" class="!border-none">
                    <div class="w-full flex flex-col items-start justify-start gap-4 !border-none">
                        <div>All</div>
                    </div>
                </x-tab>
                <x-tab name="graded-tab" label="Graded">
                    <div>Tricks</div>
                </x-tab>
                <x-tab name="ungraded-tab">
                    <x-slot:label>
                        Ungraded
                        <x-badge value="3" class="badge-primary"/>
                    </x-slot:label>
                    <div>Musics</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code>

</div>
