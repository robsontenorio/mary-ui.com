<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Header')] class extends Component {
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

    <x-header title="Header" with-anchor />

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-header title="Personal address" subtitle="Your home address" separator />

            <x-header title="Personal address" subtitle="Your home address" size="text-xl" separator />

            <x-header title="With Anchor" subtitle="Click on title to get anchor link" with-anchor />

            <x-header title="Users">
                <x-slot:middle>
                    <x-input icon="o-magnifying-glass" placeholder="Search..." />
                </x-slot:middle>
                <x-slot:actions>
                    <x-button icon="o-funnel" />
                    <x-button icon="o-plus" class="btn-primary" />
                </x-slot:actions>
            </x-header>
        @endverbatim
    </x-code>

    <x-header title="Progress indicator" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        Notice it only works combined with <code>separator</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            {{--  Fires when call any action on page  --}}
            <x-header title="Always fires" separator progress-indicator />

            {{-- Fires when you call `save` action --}}
            <x-header title="Only by `save`" separator progress-indicator="save" />

            <x-button label="Some action" wire:click="something" />

            <x-button label="Save action" wire:click="save" class="btn-warning" />
        @endverbatim
    </x-code>
</div>
