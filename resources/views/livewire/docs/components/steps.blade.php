<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Steps")]
#[Layout('components.layouts.app', ['description' => "Livewire UI steps component"])]
class extends Component {
    public int $step = 2;

    public function prev()
    {
        if ($this->step == 1) {
            return;
        }

        $this->step--;
    }

    public function next()
    {
        if ($this->step == 3) {
            return;
        }

        $this->step++;
    }
}; ?>

<div class="">
    <x-anchor title="Steps" />

    <x-anchor title="Example" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This components uses <code>ul</code> and <code>li</code> html tags. Make sure you have an extra rule to not override them on your custom CSS.
    </p>

    <x-code no-render language="php">
        @verbatim('docs')
            // step model
            public int $step = 2;
        @endverbatim
    </x-code>

    <x-code>
        @verbatim('docs')
            <x-steps wire:model="step" class="border my-5 p-5">
                <x-step step="1" text="Register">
                    Register step
                </x-step>
                <x-step step="2" text="Payment">
                    Payment step
                </x-step>
                <x-step step="3" text="Receive Product" class="bg-orange-100">
                    Receive Product
                </x-step>
            </x-steps>

            {{-- Create some methods to increase/decrease the model to match the step number --}}
            {{-- You could use Alpine with `$wire` here --}}
            <x-button label="Previous" wire:click="prev" />
            <x-button label="Next" wire:click="next" />
        @endverbatim
    </x-code>

</div>
