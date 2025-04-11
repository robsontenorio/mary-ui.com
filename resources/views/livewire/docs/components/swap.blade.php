<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Swap")]
#[Layout('components.layouts.app', ['description' => "Livewire UI swap component"])]
class extends Component {
    public bool $swap1 = false;

    public bool $swap2 = true;

    public bool $swap3 = false;

    public bool $swap4 = false;
}; ?>

<div class="">
    <x-anchor title="Swap" />

    <p>
        This component allows you to swap between two states (<code>true</code> / <code>false</code>) using two elements with animations.
    </p>

    <x-alert icon="o-light-bulb">
        If you have multiple <code>x-swap</code> on the same page make sure to set different ids.
    </x-alert>

    <x-anchor title="Default" size="text-xl" class="mt-14" />

    <x-code-example>
        @php
            $this->swap1 = $swap1;
        @endphp

        @verbatim('docs')
            <x-swap wire:model="swap1" />
        @endverbatim
    </x-code-example>

    <x-code-example no-render language="php">
        public bool $swap1 = false;
    </x-code-example>

    <x-anchor title="Text content" size="text-xl" class="mt-14" />

    <p>
        When providing the <code>true</code> or <code>false</code> attributes, the icons will be ignored.
    </p>

    <x-code-example>
        @php
            $this->swap2 = $swap2;
        @endphp
        @verbatim('docs')
            <x-swap wire:model="swap2" true="ON" false="OFF" />
        @endverbatim
    </x-code-example>

    <x-code-example no-render language="php">
        public bool $swap2 = true;
    </x-code-example>

    <x-anchor title="Custom icons + size" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            <x-swap true-icon="o-speaker-wave" false-icon="o-speaker-x-mark" icon-size="h-8 w-8" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Animations" size="text-xl" class="mt-14" />

    <p>
        It supports <a href="https://daisyui.com/components/swap/" class="underline">daisy-ui's swap animations</a>.
    </p>

    <x-alert icon="o-light-bulb" class="mb-5">
        If you have multiple <code>x-swap</code> on the same page make sure to set different ids.
    </x-alert>

    <x-code-example class="space-x-8">
        @verbatim('docs')
            <x-swap id="fade" />
            <x-swap id="flip" class="swap-flip" />
            <x-swap id="rotate" class="swap-rotate" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Custom content" size="text-xl" class="mt-14" />

    <p>
        It is possible to provide completely custom content. Please, note that the width will always be the width of the larger content.
    </p>

    <x-code-example>
        @php
            $this->swap3 = $swap3;
        @endphp
        @verbatim('docs')
            <x-swap wire:model="swap3" id="custom">
                <x-slot:true class="bg-warning rounded p-2">
                    Custom true
                </x-slot:true>
                <x-slot:false class="bg-secondary text-white p-2">
                    Custom false
                </x-slot:false>
            </x-swap>
        @endverbatim
    </x-code-example>

    <x-anchor title="Before and after" size="text-xl" class="mt-14" />

    <p>
        You can add content before and after the content as well.
    </p>

    <x-code-example>
        @php
            $this->swap4 = $swap4;
        @endphp
        @verbatim('docs')
            <x-swap id="slots" wire:model.live="swap4" class="flex gap-3">
                <x-slot:before class="text-primary">
                    BEFORE
                </x-slot:before>
                <x-slot:after class="text-error">
                    AFTER
                </x-slot:after>
            </x-swap>
        @endverbatim
    </x-code-example>
</div>
