<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Steps")]
#[Layout('components.layouts.app', ['description' => "Livewire UI steps component"])]
class extends Component {
    public int $step = 2;

    public int $example = 1;

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

    public function prev2()
    {
        if ($this->example == 1) {
            return;
        }

        $this->example--;
    }

    public function next2()
    {
        if ($this->example == 3) {
            return;
        }

        $this->example++;
    }
}; ?>

<div class="docs">
    <x-anchor title="Steps" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Alternately check the <a href="/docs/components/timeline" wire:navigate>Timeline</a> component.
    </x-alert>

    <x-anchor title="Example" size="text-xl" class="mt-14" />

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
            <x-steps wire:model="step" class="border-y border-base-content/10 my-5 py-5">
                <x-step step="1" text="Register">
                    Register step
                </x-step>
                <x-step step="2" text="Payment">
                    Payment step
                </x-step>
                <x-step step="3" text="Receive Product" class="bg-orange-500/20">
                    Receive Product
                </x-step>
            </x-steps>

            {{-- Create some methods to increase/decrease the model to match the step number --}}
            {{-- You could use Alpine with `$wire` here --}}
            <x-button label="Previous" wire:click="prev" />
            <x-button label="Next" wire:click="next" />
        @endverbatim
    </x-code>

    <x-anchor title="Style" size="text-xl" class="mt-14" />

    <p>
        Remember if you are using deeper CSS classes than <code>steps-xxxx</code> provided by daisyUI you must configure the Tailwind <strong>safelist</strong>.
    </p>

    <x-code>
        @verbatim('docs')
            <x-steps wire:model="example" steps-color="step-warning">
                <x-step step="1" text="A" />
                <x-step step="2" text="B" />
                <x-step step="3" text="C" data-content="✓" step-classes="!step-success" />
            </x-steps>

            <hr class="my-5 border-base-content/10" />

            <x-button label="Previous" wire:click="prev2" />
            <x-button label="Next" wire:click="next2" />

        @endverbatim
    </x-code>

</div>
