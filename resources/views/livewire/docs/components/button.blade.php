<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new 
#[Title('Button')] 
#[Layout('components.layouts.app', ['description' => 'Livewire UI button component with icon, tooltip, spinner and customizable slots.'])] 
class extends Component
{
    public function save()
    {
        sleep(1);
    }

    public function save2()
    {
        sleep(1);
    }
}

?>

<div class="docs">
    <x-anchor title="Button" />

    <x-code class="flex flex-wrap gap-3">
        @verbatim('docs')
            <x-button label="Hi!" class="btn-outline" tooltip="Mary" />

            <x-button label="Hello" icon-right="o-x-circle" tooltip-bottom="Joe" class="btn-warning" />

            <x-button label="There" icon="o-check" tooltip-left="Marina" class="btn-success" />

            <x-button class="btn-primary" tooltip-right="Giovanna">
                With default slot
            </x-button>

            <x-button icon="o-user" class="btn-circle" />

            <x-button icon="o-user" class="btn-circle btn-outline" />

            <x-button icon="o-user" class="btn-circle btn-ghost" />

            <x-button icon="o-user" class="btn-square" />
        @endverbatim
    </x-code>

    <x-anchor title="Links" size="text-2xl" class="mt-10 mb-5" />
    <p>
        You can make a button act as a link by placing a <code>link</code> property. You can use all the options described above for ordinary buttons.
    </p>

    <x-code class="flex flex-wrap gap-3">
        @verbatim('docs')
            {{--  It uses `wire:navigate` --}}
            <x-button label="Go to installation" link="/docs/installation" class="btn-ghost" />

            {{--  Note `external` for external links  --}}
            <x-button label="Google" link="https://google.com" external icon="o-link" />
        @endverbatim
    </x-code>

    <x-anchor title="Spinners" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @verbatim('docs')
            {{-- It automatically targets to self `wire:click` action  --}}
            <x-button label="Self target" wire:click="save" icon-right="o-lock-closed" spinner />

            <x-form wire:submit="save2">
                <x-input label="Name" inline />
                <x-slot:actions>
                    {{-- No target spinner --}}
                    <x-button label="No target" />

                    {{-- Target is `save2` --}}
                    <x-button label="Custom target" type="submit" class="btn-primary" spinner="save2" />
                </x-slot:actions>
            </x-form>

        @endverbatim
    </x-code>

</div>
