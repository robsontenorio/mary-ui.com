<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Swap")]
#[Layout('components.layouts.app', ['description' => "Livewire UI swap component"])]
class extends Component {
    public ?bool $swap1 = null;

    public ?bool $swap2 = null;
}; ?>

<div class="">
    <x-anchor title="Swap" />

    <x-anchor title="Default" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Allows you to swap between any two elements with animations.<br/>
        By default you don't need to pass any attributes. The default swaps between:

        <ul class="list-disc ml-6">
            <li>True: Sun icon</li>
            <li>False: Moon icon</li>
            <li>Size: h-5 w-5</li>
        </ul>
    </p>

    <x-code>
        @verbatim('docs')
            {{-- Notice, you don't need wire:model  --}}
            <x-swap />
        @endverbatim
    </x-code>

    <x-anchor title="Custom icons + size" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            <x-swap true-icon="o-speaker-wave" false-icon="o-speaker-x-mark" icon-size="h-8 w-8" />
        @endverbatim
    </x-code>

    <x-anchor title="Text content" size="text-2xl" class="mt-10 mb-5" />

    <p>
        When providing the 'true' or 'false' attributes (slots), the icons will be ignored.
    </p>

    <x-code>
        @verbatim('docs')
            <x-swap true="ON" false="OFF" />
        @endverbatim
    </x-code>

    <x-anchor title="Animations" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Supports <a href="https://daisyui.com/components/swap/" class="underline">daisy-ui's swap animations</a>.<br/>
        You have to make sure multiple swaps on the same page don't have the same id.
    </p>

    <x-code class="space-x-8">
        @verbatim('docs')
            {{-- Notice: no class --}}
            <x-swap id="fade" />

            {{-- Notice: class="swap-flip" --}}
            <x-swap id="flip" class="swap-flip" />

            {{-- Notice: class="swap-rotate" --}}
            <x-swap id="rotate" class="swap-rotate" />
        @endverbatim
    </x-code>

    <x-anchor title="Custom content" size="text-2xl" class="mt-10 mb-5" />

    <p>
        It is possible to provide completely custom content! <br/>
        Please note that the width will aways be the width of the larger content.
    </p>

    <x-code>
        @verbatim('docs')
            <x-swap id="custom">

                <x-slot:true
                    class="h-12 p-2 bg-primary text-primary-content rounded-2xl flex flex-row items-center justify-center">
                    Custom true
                </x-slot:true>

                <x-slot:false
                    class="h-12 p-2 bg-error text-error-content rounded flex flex-row items-center justify-center">
                    Custom false
                </x-slot:false>

            </x-swap>
        @endverbatim
    </x-code>

    <x-anchor title="Before and after" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can add content before and after the content as well.
    </p>

    <x-code>
        @verbatim('docs')
            <x-swap id="slots" wire:model.live="swap1" class="flex flex-row space-x-2 w-fit">

                <x-slot:before class="text-primary">
                    Swap me!
                </x-slot:before>
        
                {{-- This only works with wire:model.live --}}
                <x-slot:after class="text-error">
                    {{ $this->swap1 ? 'ON' : 'OFF' }}
                </x-slot:after>
        
            </x-swap>
        @endverbatim
    </x-code>

    <x-anchor title="Toggle programmatically" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="flex flex-row items-center space-x-4">
        @verbatim('docs')
            <x-button label="Toggle" wire:click="$toggle('swap2')" />
            <x-swap id="programmatically" wire:model="swap2" icon-size="h-8 w-8"
                    true-icon="o-arrow-right" false-icon="o-arrow-left" class="swap-flip" />
        @endverbatim
    </x-code>


</div>
