<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Header')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI page header component with title, subtitle, progress indicator and customizable slots.'])]
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

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-header title="Personal address" subtitle="Your home address" separator />

            <x-header title="Personal address" subtitle="Your home address" size="text-xl" separator />

            <x-header title="With Anchor" subtitle="Click on title to get anchor link" with-anchor />

            <x-header title="Users" subtitle="Check this on mobile">
                <x-slot:middle class="!justify-end">
                    <x-input icon="o-magnifying-glass" placeholder="Search..." />
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-funnel" />
                    <x-button icon="o-plus" class="btn-primary" />
                </x-slot:actions>
            </x-header>
        @endverbatim
    </x-code>

    <x-anchor title="Progress indicator" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Notice it only works combined with the <code>separator</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            {{--  This fires when you call any action on the page  --}}
            <x-header title="Always fires" separator progress-indicator />

            {{-- This fires when you call the `save` action --}}
            <x-header title="Only by `save`" separator progress-indicator="save" />

            <x-button label="Some action" wire:click="something" />

            <x-button label="Save action" wire:click="save" class="btn-warning" />
        @endverbatim
    </x-code>
</div>
