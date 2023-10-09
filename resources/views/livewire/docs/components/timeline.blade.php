<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Timeline')] class extends Component {
}
?>
<div class="docs">
    <x-header title="Timeline" />

    <x-code>
        @verbatim('docs')
            {{-- Cut top edge with `first` --}}
            <x-timeline-item title="Register" first />

            <x-timeline-item title="Payment" subtitle="10/23/2023" />

            <x-timeline-item title="Analysis" subtitle="10/23/2023" description="Just checking" />

            {{-- Note `pending` --}}
            <x-timeline-item title="Prepare" pending description="Prepare to ship" />

            {{-- Cut bottom edge with `last` --}}
            <x-timeline-item title="Shipment" pending last description="It is shiped :)" />
        @endverbatim
    </x-code>
</div>
