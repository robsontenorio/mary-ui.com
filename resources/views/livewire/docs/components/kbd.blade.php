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
    <x-code-example>
        @verbatim('docs')
            <x-kbd>A</x-kbd>
            <x-kbd class="kbd-lg">B</x-kbd>
            <x-kbd class="kbd-xl">C</x-kbd>
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    {{--@formatter:off--}}
    <x-code-example>
        @verbatim('docs')
            Press <x-kbd>⌘</x-kbd> <x-kbd>P</x-kbd> to pay.
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

</div>
