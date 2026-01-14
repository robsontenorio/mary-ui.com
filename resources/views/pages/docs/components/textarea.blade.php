<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Textarea')]
#[Layout('layouts.app', ['description' => 'Livewire UI textarea component with builtin validation support.'])]
class extends Component {
    public ?string $bio = '';
}

?>
<div class="docs">
    <x-anchor title="Textarea" />

    <p>This component uses the native HTML textarea.</p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need a rich text editor check the <a href="/docs/components/editor" wire:navigate>Editor</a> component.
    </x-alert>

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-10">
        @verbatim('docs')
            <x-textarea label="Biography" wire:model="bio" placeholder="Here ..." hint="Max 1000 chars" rows="5" />

            <x-textarea label="Biography" wire:model="bio" placeholder="Inline" rows="5" inline />
        @endverbatim
    </x-code-example>
</div>
