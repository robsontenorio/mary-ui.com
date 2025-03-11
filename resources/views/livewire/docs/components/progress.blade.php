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

    <x-anchor title="Loading" size="text-2xl" class="mt-10 !mb-5" />

    <x-code class="flex gap-8">
        @verbatim('docs')
            <x-loading />
            <x-loading class="progress-primary" />
            <x-loading class="loading-dots" />
            <x-loading class="loading-bars" />
            <x-loading class="loading-ring" />
            <x-loading class="loading-infinity loading-xs" />
        @endverbatim
    </x-code>

    <x-anchor title="Bars" size="text-2xl" class="mt-10 !mb-5" />

    <x-code class="grid gap-8">
        @verbatim('docs')
            <x-progress value="12" max="100" />
            <x-progress value="12" max="100" class="progress-warning h-3" />
            <x-progress value="12" max="100" class="w-56 progress-error" />
            <x-progress class="progress-primary h-0.5" indeterminate />
        @endverbatim
    </x-code>

    <x-anchor title="Radial" size="text-2xl" class="mt-10 !mb-5" />

    <x-code class="flex flex-wrap gap-8">
        @verbatim('docs')
            <x-progress-radial value="56" />
            <x-progress-radial value="78" unit="h" class="text-warning" />
            <x-progress-radial value="87" class="text-primary" />

            {{-- For futher customization use `style` --}}
            <x-progress-radial value="12" class="bg-primary text-primary-content border-4 border-primary" />
            <x-progress-radial value="98" class="text-success" style="--size:6rem; --thickness: 2px" />
        @endverbatim
    </x-code>

    <x-anchor title="Special <HR>" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        It is intended to be part of layout, but acts as an indeterminate progress indicator to any target or specific targets.
    </p>

    <x-code>
        @verbatim('docs')
            <div class="flex gap-5">
                <x-input placeholder="Name ..." wire:model.live.debounce="name" />
                <x-button label="Save" wire:click="save" />
            </div>

            {{-- Always --}}
            <x-hr />

            <div>
                The above HR always triggers. The bellow only on target action.
            </div>

            {{-- Only on `save` action --}}
            <x-hr target="save" />

        @endverbatim
    </x-code>
</div>
