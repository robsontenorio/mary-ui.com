<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Textarea')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI textarea component with builtin validation support.'])]
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

    <x-anchor title="Example" size="text-2xl" class="mt-10 !mb-5" />

    <x-code>
        @verbatim('docs')
            <x-textarea
                label="Bio"
                wire:model="bio"
                placeholder="Your story ..."
                hint="Max 1000 chars"
                rows="5"
                inline />
        @endverbatim
    </x-code>
</div>
