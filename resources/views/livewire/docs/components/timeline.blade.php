<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Timeline')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI full featured timeline component with title, description and date.'])]
class extends Component {
}
?>
<div class="docs">
    <x-anchor title="Timeline" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Alternately check the <a href="/docs/components/Steps" wire:navigate>Steps</a> component.
    </x-alert>

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            {{-- Cut top edge with `first` --}}
            <x-timeline-item title="Register" first />

            <x-timeline-item title="Payment" subtitle="10/23/2023" />

            <x-timeline-item title="Analysis" subtitle="10/23/2023" description="Just checking" />

            {{-- Notice `pending` --}}
            <x-timeline-item title="Prepare" pending description="Prepare to ship" />

            {{-- Cut bottom edge with `last` --}}
            <x-timeline-item title="Shipment" pending last description="It is shiped :)" />
        @endverbatim
    </x-code>

    <x-anchor title="Icons" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            <x-timeline-item title="Order placed" first icon="o-map-pin" />

            <x-timeline-item title="Payment confirmed" icon="o-credit-card" />

            <x-timeline-item title="Shipped" icon="o-paper-airplane" />

            <x-timeline-item title="Delivered" pending last icon="o-gift" />
        @endverbatim
    </x-code>
</div>
