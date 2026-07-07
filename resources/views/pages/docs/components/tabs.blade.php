<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Tabs')]
#[Layout('layouts.app', ['description' => 'Livewire UI tabs component with icons and dynamic selection.'])]
class extends Component {
    public string $selectedTab = 'tricks-tab';

    public string $myTab = 'house-tab';

    public string $someTab = 'joe-tab';

    public string $anotherTab = 'car-tab';

    public string $tabSelected = 'school-tab';
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
                <x-tab name="house-tab">
                    <x-slot:label>  {{-- [tl! highlight:2] --}}
                        House <i>Label</i>
                    </x-slot:label>

                    <div>House</div>
                </x-tab>
                <x-tab name="toy-tab" label="Broken Toys" badge="1">
                    <div>Toy</div>
                </x-tab>
                <x-tab name="garage-tab" label="Garage" badge="3" badge-class="!badge-primary">
                    <div>Garage</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code-example>

    <x-anchor title="Disabled state" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            <x-tabs wire:model="someTab">
                <x-tab name="mary-tab" label="Mary">
                    <div>Mary</div>
                </x-tab>
                <x-tab name="joe-tab" label="Joe">
                    <div>Joe</div>
                </x-tab>
                <x-tab name="ana-tab" label="Ana">
                    <div>Ana</div>
                </x-tab>
                <x-tab name="marina-tab" label="Marina" disabled>
                    <div>Marina</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code-example>

    <x-anchor title="Hidden state" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            <x-tabs wire:model="anotherTab">
                <x-tab name="car-tab" label="Car">
                    <div>Car</div>
                </x-tab>
                <x-tab name="bus-tab" label="Bus" hidden>
                    <div>Bus</div>
                </x-tab>
                <x-tab name="train-tab" label="Train">
                    <div>Train</div>
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
                active-class="text-primary before:h-1 before:text-primary"
                label-class="uppercase italic"
                content-class="shadow-lg !p-10"
            >
                <x-tab name="school-tab" label="School">
                    <div>School</div>
                </x-tab>
                <x-tab name="job-tab" label="Job">
                    <div>Job</div>
                </x-tab>
                <x-tab name="park-tab" label="Park">
                    <div>Park</div>
                </x-tab>
            </x-tabs>
        @endverbatim
    </x-code-example>

</div>
