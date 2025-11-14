<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Statistic')]
#[Layout('layouts.app', ['description' => 'Livewire UI statistics component with icon, description and tooltip.'])]
class extends Component {
}
?>
<div class="docs">
    <x-anchor title="Statistic" />

    <x-code-example class="bg-base-200 grid md:grid-cols-4 gap-5">
        @verbatim('docs')
            <x-stat
                title="Messages"
                value="44"
                icon="o-envelope"
                tooltip="Hello"
                color="text-primary" />

            <x-stat
                title="Sales"
                description="This month"
                value="22.124"
                icon="o-arrow-trending-up"
                tooltip-bottom="There" />

            <x-stat
                title="Lost"
                description="This month"
                value="34"
                icon="o-arrow-trending-down"
                tooltip-left="Ops!" />

            <x-stat
                title="Sales"
                description="This month"
                value="22.124"
                icon="o-arrow-trending-down"
                class="text-orange-500"
                color="text-pink-500"
                tooltip-right="Gosh!" />
        @endverbatim
    </x-code-example>
</div>
