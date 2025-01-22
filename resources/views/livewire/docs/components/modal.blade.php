<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Modal')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI modal component with title, subtitle, actions and customizable slots.'])]
class extends Component {
    public bool $myModal1 = false;

    public bool $myModal2 = false;

    public bool $myModal3 = false;

    public bool $myModal4 = false;
}

?>

<div class="docs">

    <x-anchor title="Modal" />

    <x-anchor title="Basic" size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render language="php">
        public bool $myModal1 = false;
    </x-code>

    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal1" class="backdrop-blur">
                <div class="mb-5">Press `ESC`, click outside or click `CANCEL` to close.</div>
                <x-button label="Cancel" @click="$wire.myModal1 = false" />
            </x-modal>

            <x-button label="Open" @click="$wire.myModal1 = true" />
        @endverbatim
    </x-code>

    <x-anchor title="Complex" size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render language="php">
        public bool $myModal2 = false;
    </x-code>

    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal2" title="Hello" subtitle="Livewire example" separator>
                <div>Hey!</div>

                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.myModal2 = false" />
                    <x-button label="Confirm" class="btn-primary" />
                </x-slot:actions>
            </x-modal>

            <x-button label="Open" @click="$wire.myModal2 = true" />
        @endverbatim
    </x-code>

    <x-anchor title="Persistent" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Add the <code>persistent</code> attribute to prevent modal close on click outside or when pressing `ESC` key.
    </p>

    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal3" persistent>
                <div>Processing ...</div>
                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.myModal3 = false" />
                </x-slot:actions>
            </x-modal>

            <x-button label="Open Persistent" @click="$wire.myModal3 = true" />
        @endverbatim
    </x-code>

    <x-anchor title="Styling" size="text-2xl" class="mt-10 mb-5" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Remember to add <code>box-class</code> custom classes on Tailwind <strong>safelist</strong>.
    </x-alert>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal4" class="backdrop-blur" box-class="bg-red-50 p-10 w-64">
                Hello!
            </x-modal>

            <x-button label="Open " @click="$wire.myModal4 = true" />
        @endverbatim
    </x-code>

    <x-anchor title="Native Dialog Behavior" size="text-2xl" class="mt-10 mb-5" />

    <p>
        When passing the <code>id</code> attribute to the component, it is necessary to use it in the same way you would
        with the <code>&lt;dialog&gt;</code> element.
    </p>

    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal id="my_modal_1">
                Hello!
                <x-slot:actions>
                    <x-button label="Cancel" onclick="my_modal_1.close()" />
                </x-slot:actions>
            </x-modal>

            <x-button label="Open " onclick="my_modal_1.showModal()" />
        @endverbatim
    </x-code>
    
</div>
