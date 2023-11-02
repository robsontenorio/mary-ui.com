<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Textarea')] #[Layout('components.layouts.app', ['description' => 'Livewire UI textarea component with builtin validation support.'])] class extends Component
{
    public ?string $bio = '';
}

?>
<div class="docs">
    <x-anchor title="Textarea" />

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
