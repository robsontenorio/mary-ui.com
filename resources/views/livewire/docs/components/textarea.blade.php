<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Textarea')] class extends Component
{
    public ?string $bio = '';
}

?>
<div>
<x-markdown>
# Textarea
</x-markdown>

<x-code>
@verbatim
<x-textarea 
    label="Bio" 
    wire:model="bio"
    placeholder="Your history ..."
    hint="Max 1000 chars"             
    rows="5" 
    inline />
@endverbatim
</x-code>
</div>
