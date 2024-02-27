<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Modal')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI modal component with title, subtitle, actions and customizable slots.'])]
class extends Component {
    public bool $myModal = false;

    public bool $myPersistentModal = false;
}

?>

<div class="docs">

    <x-anchor title="Modal" />
    <x-anchor title="Native HTML" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Notice the following examples that <code>onclick</code> , <code>.showModal()</code> and <code>.close()</code> are native HTML stuff, not maryUI/Livewire/Alpine.
    </p>

    <br>

    <x-code>
        @verbatim('docs')
            {{-- Notice `onclick` is HTML --}}
            <x-button label="Open modal" class="btn-primary" onclick="modal17.showModal()" />

            {{-- Here is modal`s ID --}}
            <x-modal id="modal17" title="Are you sure?">
                Click "cancel" or press ESC to exit.

                <x-slot:actions>
                    {{-- Notice `onclick` is HTML --}}
                    <x-button label="Cancel" onclick="modal17.close()" />
                    <x-button label="Confirm" class="btn-primary" />
                </x-slot:actions>
            </x-modal>
        @endverbatim
    </x-code>

    <x-anchor title="With Livewire" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Instead of <code>id="xxx"</code> use <code>wire:model</code>.
    </p>

    <x-code no-render language="php">
        public bool $myModal = false;
    </x-code>

    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            {{-- Livewire: fires network request --}}
            <x-button label="Livewire" class="btn-primary" wire:click="$toggle('myModal')" />

            {{-- Alpine: no network request --}}
            <x-button label="Alpine" class="btn-warning" @click="$wire.myModal = true" />

            {{-- Notice `wire:model`, no `id="xxx"` --}}
            <x-modal wire:model="myModal" title="Hello" subtitle="Livewire example" separator>
                Press `ESC`, click outside or click `CANCEL` button to close.

                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.myModal = false" />
                    <x-button label="Confirm" class="btn-primary" />
                </x-slot:actions>
            </x-modal>
        @endverbatim
    </x-code>

    <x-anchor title="Persistent" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Add the <code>persistent</code> attribute to prevent modal close on click outside or when pressing `ESC` key.
    </p>

    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            {{-- Livewire: fires network request --}}
            <x-button label="Livewire" class="btn-primary" wire:click="$toggle('myPersistentModal')" />

            {{-- Alpine: no network request --}}
            <x-button label="Alpine" class="btn-warning" @click="$wire.myPersistentModal = true" />

            {{-- Notice `persistent` --}}
            <x-modal wire:model="myPersistentModal" title="Persistent" separator persistent>
                I won't close unless you click on `CANCEL` button.

                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.myPersistentModal = false" />
                    <x-button label="Confirm" class="btn-primary" />
                </x-slot:actions>
            </x-modal>
        @endverbatim
    </x-code>

</div>
