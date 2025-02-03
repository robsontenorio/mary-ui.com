<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Pin')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI pin component.'])]
class extends Component {
    public string $pin1;

    public string $pin2;

    public string $pin3;

    public bool $show = false;
}; ?>

<div class="docs">
    <x-anchor title="Pin" />

    <x-anchor title="Default" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The default behavior accept any character.
    </p>

    <x-code>
        @verbatim('docs')
            <x-pin wire:model="pin1" size="3" />
        @endverbatim
    </x-code>

    <x-anchor title="Numeric" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The <code>numeric</code> property modifies the behavior to accept only numbers.
    </p>

    <x-code>
        @verbatim('docs')
            <x-pin wire:model="pin2" size="4" numeric />
        @endverbatim
    </x-code>

    <x-anchor title="Security" size="text-2xl" class="mt-10 mb-5" />

    <p>You can use any compatible <code>text-secure</code> HTML symbol.</p>

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-pin wire:model="pin1" size="3" hide />
            <x-pin wire:model="pin1" size="3" hide hide-type="circle" />
            <x-pin wire:model="pin1" size="3" hide hide-type="square" />
        @endverbatim
    </x-code>

    <x-anchor title="Events" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The <code>@completed</code> and <code>@incomplete</code> events are triggered respectively when the pin is completed or is incomplete.
    </p>

    <x-code>
        @verbatim('docs')
            <x-pin wire:model="pin3" size="5" @completed="$wire.show = true" @incomplete="$wire.show = false" />

            <template x-if="$wire.show">
                <x-alert icon="o-check-circle" class="mt-5">
                    You have typed : <span x-text="$wire.pin3"></span>
                </x-alert>
            </template>
        @endverbatim
    </x-code>
</div>
