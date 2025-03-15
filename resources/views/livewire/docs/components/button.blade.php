<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Button')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI button component with icon, tooltip, spinner and customizable slots.'])]
class extends Component {
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

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code class="flex flex-wrap gap-3 items-baseline">
        @verbatim('docs')
            {{--  DEFAULT --}}
            <x-button label="Hi!" />

            {{--  COLOR AND STYLE --}}
            <x-button label="Hi!" class="btn-primary" />
            <x-button label="How" class="btn-warning" />
            <x-button label="Are" class="btn-success" />
            <x-button label="You?" class="btn-error btn-sm btn-soft" />

            {{-- SLOT--}}
            <x-button class="btn-primary btn-dash">
                With default slot 😃
            </x-button>

            {{-- CIRCLE --}}
            <x-button icon="o-user" class="btn-circle" />
            <x-button icon="o-user" class="btn-circle btn-outline" />

            {{-- SQUARE --}}
            <x-button icon="o-user" class="btn-circle btn-ghost" />
            <x-button icon="o-user" class="btn-square" />

        @endverbatim
    </x-code>

    <x-anchor title="Icons" size="text-xl" class="mt-14" />

    <x-code class="flex flex-wrap gap-3">
        @verbatim('docs')
            <x-button label="Hello" icon="o-check" />

            <x-button label="There" icon-right="o-x-circle" />
        @endverbatim
    </x-code>

    <x-anchor title="Tooltips" size="text-xl" class="mt-14" />
    <p>
        Tooltips are disabled on small screens.
    </p>

    <x-code class="flex flex-wrap gap-3">
        @verbatim('docs')
            <x-button label="Up" tooltip="Mary" />

            <x-button label="Bottom" tooltip-bottom="Joe" />

            <x-button label="Left" tooltip-left="Marina" />

            <x-button label="Right" tooltip-right="Amanda" />
        @endverbatim
    </x-code>

    <x-anchor title="Badges" size="text-xl" class="mt-14" />
    <br>

    <x-code class="flex flex-wrap gap-3">
        @verbatim('docs')
            <x-button label="Hello" badge="12" />

            <x-button label="There" badge="8" badge-classes="badge-warning" />
        @endverbatim
    </x-code>

    <x-anchor title="Responsive" size="text-xl" class="mt-14" />
    <p>
        On small screens the label is hidden. Icon and badge are kept.
    </p>

    <x-code class="flex flex-wrap gap-3">
        @verbatim('docs')
            <x-button label="There" icon="o-home" badge="12" responsive />

            <x-button label="There" icon="o-check" responsive />
        @endverbatim
    </x-code>

    <x-anchor title="Links" size="text-xl" class="mt-14" />
    <p>
        You can make a button act as a link by placing a <code>link</code> property. You can use all the options described above for ordinary buttons.
    </p>

    <x-code class="flex flex-wrap gap-3">
        @verbatim('docs')
            {{--  It uses `wire:navigate` --}}
            <x-button label="Go to installation" link="/docs/installation" class="btn-ghost" />

            {{--  Notice `no-wire-navigate` --}}
            <x-button label="Go to demos" link="/docs/demos" no-wire-navigate class="btn-ghost" />

            {{--  Notice `external` for external links  --}}
            <x-button label="Google" link="https://google.com" external icon="o-link" tooltip="Go away!" />
        @endverbatim
    </x-code>

    <x-anchor title="Spinners" size="text-xl" class="mt-14" />

    <x-code class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @verbatim('docs')
            {{-- It automatically targets to self `wire:click` action  --}}
            <x-button label="Self target" wire:click="save" icon-right="o-lock-closed" spinner />

            <x-form wire:submit="save2">
                <x-input placeholder="Name" />
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
