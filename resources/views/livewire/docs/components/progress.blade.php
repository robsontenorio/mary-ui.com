<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Progress')]
#[Layout('components.layouts.app', ['description' => 'Progress livewire UI component with custom colors and percentage.'])]
class extends Component {
    public string $name = '';

    public function save(): void
    {
        sleep(1);
    }
}; ?>

<div class="docs">
    <x-anchor title="Progress" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need rich progress charts see <a href="/docs/components/chart" wire:navigate>Chart</a> component.
    </x-alert>

    <x-anchor title="Loading" size="text-xl" class="mt-14" />

    <x-code-example class="flex gap-8">
        @verbatim('docs')
            <x-loading />
            <x-loading class="progress-primary" />
            <x-loading class="loading-dots" />
            <x-loading class="loading-bars" />
            <x-loading class="loading-ring" />
            <x-loading class="loading-infinity loading-xs" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Bars" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-8">
        @verbatim('docs')
            <x-progress value="12" max="100" />
            <x-progress value="12" max="100" class="progress-warning h-3" />
            <x-progress value="12" max="100" class="w-56 progress-error" />
            <x-progress class="progress-primary h-0.5" indeterminate />
        @endverbatim
    </x-code-example>

    <x-anchor title="Radial" size="text-xl" class="mt-14" />

    <x-code-example class="flex flex-wrap gap-8">
        @verbatim('docs')
            <x-progress-radial value="56" />
            <x-progress-radial value="78" unit="h" class="text-warning" />
            <x-progress-radial value="87" class="text-primary" />

            {{-- For futher customization use `style` --}}
            <x-progress-radial value="12" class="bg-primary text-primary-content border-4 border-primary" />
            <x-progress-radial value="98" class="text-success" style="--size:6rem; --thickness: 2px" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Special <HR>" size="text-xl" class="mt-14" />

    <p>
        It is intended to be part of layout, but acts as an indeterminate progress indicator to any target or specific targets.
    </p>

    <x-code-example>
        @verbatim('docs')
            <div class="flex gap-5">
                <x-input placeholder="Type ..." wire:model.live.debounce="name" />
                <x-button label="Save" wire:click="save" />
            </div>

            {{-- Always --}}
            <x-hr />

            <div>
                The above HR always triggers. The below only on target action.
            </div>

            {{-- Only on `save` action --}}
            <x-hr target="save" />

        @endverbatim
    </x-code-example>
</div>
