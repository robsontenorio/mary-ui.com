<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Dropdown')] class extends Component {
    public function delete()
    {
        sleep(1);
    }
}

?>

<div class="docs">
    <x-anchor title="Dropdown" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Dropdowns are just a suspended <a href="/docs/components/menu" wire:navigate>Menu</a>. Take a look at <a href="/docs/components/select" wire:navigate>Select</a> for value
        selection.
    </x-alert>

    <x-code class="flex justify-between">
        @verbatim('docs')
            {{-- Default trigger --}}
            <x-dropdown>
                <x-menu-item title="Archive" icon="o-archive-box" />
                <x-menu-item title="Remove" icon="o-trash" />
                <x-menu-item title="Restore" icon="o-arrow-path" />
            </x-dropdown>

            {{-- Custom trigger  --}}
            <x-dropdown>
                <x-slot:trigger>
                    <x-button icon="o-bell" class="btn-circle btn-outline" />
                </x-slot:trigger>

                <x-menu-item title="Archive" />
                <x-menu-item title="Move" />
            </x-dropdown>

            {{-- Use `right` if dropdown is on right side of screen --}}
            <x-dropdown label="Hello" class="btn-warning" right>
                <x-menu-item title="It should align correctly on right side" />
                <x-menu-item title="Yes!" />
            </x-dropdown>
        @endverbatim
    </x-code>

    <x-anchor title="Click propagation" size="text-2xl" class="mt-10 mb-5" />

    <p>
        By default, any click closes the dropdown. Just use <code>@click.stop</code> or <code>wire:click.stop</code> to prevent this behavior.
    </p>

    <x-code>
        @verbatim('docs')
            <x-dropdown label="Settings" class="btn-outline">
                {{-- By default any click closes dropdown --}}
                <x-menu-item title="Close after click" />

                <x-menu-separator />

                {{-- Use `@click.STOP` to stop event propagation --}}
                <x-menu-item title="Keep open after click" @click.stop="alert('Keep open')" />

                {{-- Or `wire:click.stop`  --}}
                <x-menu-item title="Call wire:click" wire:click.stop="delete" />

                <x-menu-separator />

                <x-menu-item @click.stop="">
                    <x-checkbox label="Activate" />
                </x-menu-item>

                <x-menu-item @click.stop="">
                    <x-toggle label="Sleep mode" right />
                </x-menu-item>
            </x-dropdown>
        @endverbatim
    </x-code>
</div>
