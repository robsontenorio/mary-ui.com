<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Tags')]
#[Layout('components.layouts.app', ['description' => 'Livewire ui tags components with automatic add.'])]
class extends Component {
    #[Rule('required')]
    public array $tags = ['tech', 'gaming', 'art'];
}; ?>

<div class="docs">
    <x-anchor title="Tags" />

    <p>
        <x-alert icon="o-light-bulb" class="markdown mb-10">
            For complex multiple inputs see <a href="/docs/components/choices" wire:navigate>Choices</a> component, which supports online async search.
        </x-alert>
    </p>

    <x-code>
        @verbatim('docs')
            <x-tags label="Tags" wire:model="tags" icon="o-home" hint="Hit enter to create a new tag" />
        @endverbatim
    </x-code>
    <x-code language="php" no-render>
        @verbatim('docs')
            public array $tags = ['tech', 'gaming', 'art'];
        @endverbatim
    </x-code>
</div>
