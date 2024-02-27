<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Kbd')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI Kbd component used to display keyboard shortcuts.'])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Kbd" />

    <p>
        Kbd is used to display keyboard shortcuts.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            <x-kbd class="kbd-sm">K</x-kbd>
            <x-kbd>b</x-kbd>
            <x-kbd class="kbd-lg">d</x-kbd>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            Press <x-kbd>F</x-kbd> to pay respects.
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

</div>
