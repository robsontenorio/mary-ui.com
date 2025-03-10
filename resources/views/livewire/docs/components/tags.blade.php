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
    public array $tags = ['tech'];
}; ?>

<div class="docs">
    <x-anchor title="Tags" />

    <p>
        This component allows to enter any kind of text, without any preset or autocompletion values. It will automatically add the text as a tag when you hit enter.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        For complex multiple inputs or preset values see <a href="/docs/components/choices" wire:navigate>Choices</a> component, that also supports online and offline search.
    </x-alert>

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
