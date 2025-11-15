<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Range Slider')]
#[Layout('layouts.app', ['description' => 'Livewire UI range slider component is used to select a value by sliding a handle.'])]
class extends Component {
    #[Rule('required|gt:10')]
    public int $level = 0;

    #[Rule('required|gt:30')]
    public int $level2 = 30;
}; ?>

<div class="docs">
    <x-anchor title="Range Slider" />
    <p>
        Range slider is used to select a value by sliding a handle.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        The following examples uses `.live` to make sure you see the changes.
    </x-alert>

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php     // [tl! .docs-hide:2]
                $level = $this->level;
            @endphp
            <x-range wire:model.live.debounce="level" label="Select a level" hint="Greater than 10." />
            <x-hr /> <!-- [tl! .docs-hide] -->
            <x-badge value="Selected: {{ $level }}" class="badge-neutral" /> <!-- [tl! .docs-hide] -->
        @endverbatim
    </x-code-example>

    <x-code-example no-render language="php">
        @verbatim('docs')
            #[Rule('required|gt:10')]
            public int $level = 10;
        @endverbatim
    </x-code-example>

    <x-anchor title="Step & Range" size="text-xl" class="mt-14" />

    <p>
        You can also set the range limits with <code>min</code> and <code>max</code> attributes.
        Use the <code>step</code> attribute to control the increased value when sliding.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php     // [tl! .docs-hide:2]
                $level2 = $this->level2;
            @endphp
            <x-range
                wire:model.live.debounce="level2"
                min="20"
                max="80"
                step="10"
                label="Select a level"
                hint="Greater than 30."
                class="range-primary range-xs" />
            <x-hr /> <!-- [tl! .docs-hide] -->
            <x-badge value="Selected: {{ $level2 }}" class="badge-primary" /> <!-- [tl! .docs-hide] -->
        @endverbatim
    </x-code-example>

    <x-code-example no-render language="php">
        @verbatim('docs')
            #[Rule('required|gt:30')]
            public int $level2 = 30;
        @endverbatim
    </x-code-example>
</div>
