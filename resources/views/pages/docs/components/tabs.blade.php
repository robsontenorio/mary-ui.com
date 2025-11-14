<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Tabs')]
#[Layout('layouts.app', ['description' => 'Livewire UI tabs component with icons and dynamic selection.'])]
class extends Component {
    public string $selectedTab = 'tricks-tab';

    public string $myTab = 'tricks-tab';

    public string $someTab = 'users-tab';

    public string $selection = 'tricks-tab';

    public string $tabSelected = 'tricks-tab';
}

?>

<div class="docs">
    <x-anchor title="Tabs" />

    <x-anchor title="Usage" size="text-xl" class="mt-14" />

    <x-code-example>
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
            <hr class="my-5 border-base-300"><!-- [tl! .docs-hide] -->

            <x-button label="Change to Musics" @click="$wire.selectedTab = 'musics-tab'" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Slots" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            <x-tabs wire:model="myTab">
                <x-tab name="users-tab">
                    <x-slot:label>  {{-- [tl! highlight:3] --}}
                        Users
                        <x-badge value="3" class="badge-primary badge-sm" />
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
    </x-code-example>

    <x-anchor title="Disabled state" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            <x-tabs wire:model="someTab">
                <x-tab name="users-tab" label="Users">
                    <div>Users</div>
                </x-tab>
                <x-tab name="tricks-tab" label="Tricks">
                    <div>Tricks</div>
                </x-tab>
                <x-tab name="musics-tab" label="Musics">
                    <div>Musics</div>
                </x-tab>
                <x-tab name="stars-tab" label="Stars" disabled>
                    <div>Stars</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code-example>

    <x-anchor title="Hidden state" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            <x-tabs wire:model="someTab">
                <x-tab name="users-tab" label="Users">
                    <div>Users</div>
                </x-tab>
                <x-tab name="tricks-tab" label="Tricks" hidden>
                    <div>Tricks</div>
                </x-tab>
                <x-tab name="musics-tab" label="Musics">
                    <div>Musics</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code-example>

    <x-anchor title="Customisation" size="text-xl" class="mt-14" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Remember to add these custom classes on Tailwind <strong>safelist</strong>.
    </x-alert>

    <x-code-example>
        @verbatim('docs')
            <x-tabs
                wire:model="tabSelected"
                active-class="bg-primary rounded !text-white"
                label-class="font-semibold"
                label-div-class="bg-primary/5 rounded w-fit p-2"
            >
                <x-tab name="users-tab" label="Users">
                    <div>All</div>
                </x-tab>
                <x-tab name="tricks-tab" label="Tricks">
                    <div>Tricks</div>
                </x-tab>
                <x-tab name="musics-tab" label="Musics">
                    <div>Musics</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code-example>

</div>
