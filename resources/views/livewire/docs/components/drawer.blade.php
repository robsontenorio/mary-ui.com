<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Drawer')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI drawer component made easy.'])]
class extends Component {
    public bool $showDrawer1 = false;

    public bool $showDrawer2 = false;

    public bool $showDrawer3 = false;
}

?>

<div class="docs">

    <x-anchor title="Drawer" />

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            {{-- Left --}}
            <x-drawer wire:model="showDrawer1" class="w-11/12 lg:w-1/3">
                <div>...</div>
                <x-button label="Close" @click="$wire.showDrawer1 = false" />
            </x-drawer>

            {{-- Right --}}
            <x-drawer wire:model="showDrawer2" class="w-11/12 lg:w-1/3" right>
                <div>...</div>
                <x-button label="Close" @click="$wire.showDrawer2 = false" />
            </x-drawer>

            <x-button label="Open Left" wire:click="$toggle('showDrawer1')" />
            <x-button label="Open Right" wire:click="$toggle('showDrawer2')" />
        @endverbatim
    </x-code>
    
    <x-code no-render language="php">
        public bool $showDrawer1 = false;
        public bool $showDrawer2 = false;
    </x-code>

    <x-anchor title="Complex" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-drawer
                wire:model="showDrawer3"
                title="Hello"
                subtitle="Livewire"
                separator
                with-close-button
                close-on-escape
                class="w-11/12 lg:w-1/3"
            >
                <div>Hey!</div>

                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.showDrawer3 = false" />
                    <x-button label="Confirm" class="btn-primary" icon="o-check" />
                </x-slot:actions>
            </x-drawer>

            <x-button label="Open" @click="$wire.showDrawer3 = true" />

        @endverbatim
    </x-code>

    <x-anchor title="Disable focus trap" size="text-xl" class="mt-14" />

    <p>
        By default the focus trap is enabled, but you can disable it by adding the <code>without-trap-focus</code> attribute.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-drawer without-trap-focus ... />
        @endverbatim
    </x-code>

</div>
