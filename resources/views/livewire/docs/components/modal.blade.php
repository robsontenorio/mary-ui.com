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

    <x-anchor title="Native HTML" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Notice the following examples that <code>onclick</code> , <code>.showModal()</code> and <code>.close()</code> are native HTML stuff, not maryUI/Livewire/Alpine.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        This is not a recommended approach if you are using <strong>forms</strong>, because this is native HTML and there is no state management. Use it only for simple
        confirmations.
    </x-alert>

    <x-code>
        @verbatim('docs')
            {{-- Here is modal`s ID --}}
            <x-modal id="modal17" title="Are you sure?">
                <div>Click "cancel" or press ESC to exit.</div>

                <x-slot:actions>
                    {{-- Notice `onclick` is HTML --}}
                    <x-button label="Cancel" onclick="modal17.close()" />
                    <x-button label="Confirm" class="btn-primary" />
                </x-slot:actions>
            </x-modal>

            {{-- Notice `onclick` is HTML --}}
            <x-button label="Open modal" class="btn-primary" onclick="modal17.showModal()" />
        @endverbatim
    </x-code>

</div>
