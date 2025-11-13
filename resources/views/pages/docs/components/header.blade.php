<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Header')]
#[Layout('layouts.app', ['description' => 'Livewire UI page header component with title, subtitle, progress indicator and customizable slots.'])]
class extends Component {
    public function save()
    {
        sleep(1);
    }

    public function something()
    {
        sleep(1);
    }
}
?>
<div class="docs">

    <x-anchor title="Header" />

    <x-code-example class="grid gap-5">
        @verbatim('docs')
            <x-header title="Default size" subtitle="With subtitle and separator" separator />

            <x-header title="Custom size" size="text-xl" separator />

            <x-header title="With Anchor" subtitle="Click on title " with-anchor separator />

            <x-header title="Icon" icon="o-bolt" icon-classes="bg-warning rounded-full p-1 w-6 h-6" separator />

            <x-header title="Users" subtitle="This is responsive" separator>
                <x-slot:middle class="!justify-end">
                    <x-input icon="o-bolt" placeholder="Search..." />
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-funnel" />
                    <x-button icon="o-plus" class="btn-primary" />
                </x-slot:actions>
            </x-header>
        @endverbatim
    </x-code-example>

    <x-anchor title="Progress indicator" size="text-xl" class="mt-14" />

    <p>
        Notice it only works combined with the <code>separator</code> attribute.
    </p>

    <x-code-example>
        @verbatim('docs')
            {{--  This fires when you call any action on the page  --}}
            <x-header title="Always fires" separator progress-indicator />

            {{-- This fires when you call the `save` action --}}
            <x-header title="Only by `save`" separator progress-indicator="save" progress-indicator-class="progress-warning" />

            <x-button label="Some action" wire:click="something" />

            <x-button label="Save action" wire:click="save" class="btn-warning" />
        @endverbatim
    </x-code-example>
</div>
