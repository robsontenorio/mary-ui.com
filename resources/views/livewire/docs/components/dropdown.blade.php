<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Dropdown')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI dropdown component.'])]
class extends Component {
    public function delete()
    {
        sleep(1);
    }

    public function delete2()
    {
        sleep(1);
    }

    public function delete3()
    {
        sleep(1);
    }

    public function delete4()
    {
        sleep(1);
    }
}

?>

<div class="docs">
    <x-anchor title="Dropdown" />

    <p>
        Dropdowns plays nice with the <a href="/docs/components/menu" wire:navigate>Menu</a> component. Under the hood It uses the Alpine's anchor plugin to control the position.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Take a look at <a href="/docs/components/select" wire:navigate>Select</a> for value selection.
    </x-alert>

    <x-anchor title="Basic" size="text-2xl" class="mt-10 !mb-5" />

    <x-code>
        @verbatim('docs')
            <x-dropdown>
                <x-menu-item title="Archive" icon="o-archive-box" />
                <x-menu-item title="Remove" icon="o-trash" />
                <x-menu-item title="Restore" icon="o-arrow-path" />
            </x-dropdown>
        @endverbatim
    </x-code>

    <x-anchor title="Custom Trigger" size="text-2xl" class="mt-10 !mb-5" />

    <x-code>
        @verbatim('docs')
            <x-dropdown>
                <x-slot:trigger>
                    <x-button icon="o-bell" class="btn-circle btn-outline" />
                </x-slot:trigger>

                <x-menu-item title="Archive" />
                <x-menu-item title="Move" />
            </x-dropdown>
        @endverbatim
    </x-code>

    <x-anchor title="Right alignment" size="text-2xl" class="mt-10 !mb-5" />

    <x-code class="flex justify-end">
        @verbatim('docs')
            {{-- Use `right` if dropdown is on right side of screen --}}
            <x-dropdown label="Hello" class="btn-warning" right>
                <x-menu-item title="It should align correctly on right side" />
                <x-menu-item title="Yes!" />
            </x-dropdown>
        @endverbatim
    </x-code>

    <x-anchor title="Click propagation" size="text-2xl" class="mt-10 !mb-5" />

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

    <x-anchor title="Spinner" size="text-2xl" class="mt-10 !mb-5" />

    <x-code>
        @verbatim('docs')
            <x-dropdown label="Settings" class="btn-outline">
                <x-menu-item title="Spinner" wire:click.stop="delete2" spinner="delete2" />
                <x-menu-item title="Spinner" wire:click.stop="delete3" spinner="delete3" icon="o-trash" />
            </x-dropdown>
        @endverbatim
    </x-code>

    <x-anchor title="No anchor" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        By default, this component works with Alpine's anchor plugin.
        If you don't want to use it, just add <code>no-x-anchor</code> to the dropdown to manually control the position.
    </p>

    <x-code class="flex justify-between">
        @verbatim('docs')
            <x-dropdown label="Default" no-x-anchor>
                <x-menu-item title="Hey" />
                <x-menu-item title="How are you?" />
            </x-dropdown>

            <x-dropdown label="Top" no-x-anchor top>
                <x-menu-item title="Hey" />
                <x-menu-item title="How are you?" />
            </x-dropdown>

            <x-dropdown label="Right" no-x-anchor right>
                <x-menu-item title="Hey" />
                <x-menu-item title="It should align correctly on right side?" />
            </x-dropdown>
        @endverbatim
    </x-code>
</div>
