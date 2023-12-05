<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Drawer')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI drawer component made easy.'])]
class extends Component {
    public bool $showDrawer = false;
}

?>

<div class="docs">

    <x-anchor title="Drawer" />

    <x-anchor title="Native HTML" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can directly open a drawer by using native HTML <strong>label tag</strong> while referencing same drawer <code>id</code>. It closes when you click outside.
    </p>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-drawer id="my-drawer" title="Hello" class="bg-blue-50" with-close-button separator>
                Content left auto width and close button.
            </x-drawer>

            <x-drawer id="my-drawer2" title="Settings" subtitle="Main profile" separator right class="w-1/3">
                Content right with fixed width.

                <x-slot:actions>
                    <x-button label="Nothing" />
                </x-slot:actions>
            </x-drawer>

            {{-- HTML: Just reference correct drawer ID  --}}
            <label for="my-drawer" class="btn btn-primary">Open left</label>
            <label for="my-drawer2" class="btn btn-warning">Open right</label>
        @endverbatim
    </x-code>

    <x-anchor title="With Livewire" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can use all attributes described above. Instead of <code>id="xxx"</code> use <code>wire:model</code>.
    </p>

    <x-code no-render language="php">
        public bool $showDrawer = false;
    </x-code>
    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            {{-- Note `wire:model` --}}
            <x-drawer wire:model="showDrawer" class="w-1/3">

                {{-- Livewire: Server side  --}}
                <x-button label="Livewiew (server)" wire:click="$toggle('showDrawer')" class="btn-primary" />

                {{-- Alpine: Client side (no http request)  --}}
                <x-button label="Alpine (client)" @click="$wire.showDrawer = false" class="btn-warning" />
            </x-drawer>

            {{-- Livewire: Server side  --}}
            <x-button label="Livewire (server)" wire:click="$toggle('showDrawer')" class="btn-primary" />

            {{-- Alpine: Client side (no http request)  --}}
            <x-button label="Alpine (client)" @click="$wire.showDrawer = true" class="btn-warning" />
        @endverbatim
    </x-code>

</div>
