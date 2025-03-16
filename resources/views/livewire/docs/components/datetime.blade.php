<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Datetime')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI native datetime component with icons and which renders nice natively on all devices.'])]
class extends Component {
    #[Rule('required|date')]
    public ?string $myDate = '2029-06-12';

    public function save()
    {
    }
};

?>

<div class="docs">
    <x-anchor title="Date Time" />

    <x-anchor title="Native HTML" size="text-xl" class="mt-14" />

    <p>
        If you have no constraints regarding dates' selection, just stick with this approach, which renders nice natively on all devices and covers most of the use cases.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        For advanced date picker see the <a href="/docs/components/datepicker" wire:navigate>Date Picker</a> component.
    </x-alert>

    <x-code class="grid gap-5 sm:px-64">
        @verbatim('docs')
            <x-datetime label="My date" wire:model="myDate" />

            {{-- Notice `type="datetime-local"` --}}
            <x-datetime label="Date + Time" wire:model="myDate" type="datetime-local" />

            <span></span> <!-- [tl! .docs-hide] -->
            {{-- Notice `type="time"` --}}
            <x-datetime label="Time" wire:model="myDate" icon="o-calendar" type="time" inline />
        @endverbatim
    </x-code>
</div>
