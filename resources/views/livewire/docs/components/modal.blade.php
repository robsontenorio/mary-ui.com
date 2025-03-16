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

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal1" title="Hey" class="backdrop-blur">
                Press `ESC`, click outside or click `CANCEL` to close.

                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.myModal1 = false" />
                </x-slot:actions>
            </x-modal>

            <x-button label="Open" @click="$wire.myModal1 = true" />
        @endverbatim
    </x-code>

    <x-code no-render language="php">
        public bool $myModal1 = false;
    </x-code>

    <x-anchor title="Complex" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal2" title="Hello" subtitle="Livewire example">
                <x-form no-separator>
                    <x-input label="Name" icon="o-user" placeholder="The full name" />
                    <x-input label="Email" icon="o-envelope" placeholder="The e-mail" />

                    {{-- Notice we are using now the `actions` slot from `x-form`, not from modal --}}
                    <x-slot:actions>
                        <x-button label="Cancel" @click="$wire.myModal2 = false" />
                        <x-button label="Confirm" class="btn-primary" />
                    </x-slot:actions>
                </x-form>
            </x-modal>

            <x-button label="Open" @click="$wire.myModal2 = true" />
        @endverbatim
    </x-code>

    <x-anchor title="Persistent" size="text-xl" class="mt-14" />

    <p>
        Add the <code>persistent</code> attribute to prevent modal close on click outside or when pressing `ESC` key.
    </p>

    <br>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal3" title="Payment confirmation" persistent separator>
                <div class="flex justify-between">
                    Please, wait ...
                    <x-loading class="loading-infinity" />
                </div>
                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.myModal3 = false" />
                </x-slot:actions>
            </x-modal>

            <x-button label="Open Persistent" @click="$wire.myModal3 = true" />
        @endverbatim
    </x-code>

    <x-anchor title="Styling" size="text-xl" class="mt-14" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Remember to add <code>box-class</code> custom classes on Tailwind <strong>safelist</strong>.
    </x-alert>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-modal wire:model="myModal4" class="backdrop-blur" box-class="bg-warning/30 border w-64">
                Hello!
            </x-modal>

            <x-button label="Open " @click="$wire.myModal4 = true" />
        @endverbatim
    </x-code>

    <x-anchor title="Disable focus trap" size="text-xl" class="mt-14" />

    <p>
        By default the focus trap is enabled, but you can disable it by adding the <code>without-trap-focus</code> attribute.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-modal without-trap-focus ... />
        @endverbatim
    </x-code>
</div>
