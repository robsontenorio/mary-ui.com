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
        This component uses <code>ul</code> and <code>li</code> HTML tags. Make sure you have an extra rule to not override them on your custom CSS.
    </p>

    <x-code>
        @verbatim('docs')
            <x-steps wire:model="step" class="border-y border-base-content/10 my-5 py-5">
                <x-step step="1" text="Register">
                    Register step
                </x-step>
                <x-step step="2" text="Payment">
                    Payment step
                </x-step>
                <x-step step="3" text="Receive Product" class="bg-warning/20">
                    Receive Product
                </x-step>
            </x-steps>

            {{-- Create some methods to increase/decrease the model to match the step number --}}
            {{-- You could use Alpine with `$wire` here --}}
            <x-button label="Previous" wire:click="prev" />
            <x-button label="Next" wire:click="next" />
        @endverbatim
    </x-code>

    <x-code no-render language="php">
        @verbatim('docs')
            // Step model
            public int $step = 2;
        @endverbatim
    </x-code>

    <x-anchor title="Customizing" size="text-xl" class="mt-14" />

    <p class="step-info">
        Remember that if you are using deeper CSS classes than <code>steps-xxxx</code> provided by daisyUI you must configure the Tailwind <strong>safelist</strong>.
    </p>

    <p>Steps color and content.</p>

    <x-code>
        @verbatim('docs')
            <x-steps wire:model="example" steps-color="step-primary">
                <x-step step="1" text="A" />
                <x-step step="2" text="B" icon="o-user" />
                <x-step step="3" text="C" data-content="✓" />
            </x-steps>
            <hr class="my-5 border-base-content/10" />      <!-- [tl! .docs-hide] -->
            <x-button label="Previous" wire:click="prev2" />   <!-- [tl! .docs-hide] -->
            <x-button label="Next" wire:click="next2" /> <!-- [tl! .docs-hide] -->
        @endverbatim
    </x-code>

    <br>
    <p>
        You can modify the stepper style itself using the <code>stepper-classes</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            <x-steps wire:model="example" stepper-classes="w-full p-5 bg-base-200">
                <x-step step="1" text="A" />
                <x-step step="2" text="B" />
                <x-step step="3" text="C" />
            </x-steps>
            <hr class="my-5 border-base-content/10" />      <!-- [tl! .docs-hide] -->
            <x-button label="Previous" wire:click="prev2" />   <!-- [tl! .docs-hide] -->
            <x-button label="Next" wire:click="next2" /> <!-- [tl! .docs-hide] -->
        @endverbatim
    </x-code>

</div>
