<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    #[Rule('required|min:20')]
    public $name = '';

    #[Rule('required|email')]
    public $email = '';

    public function save()
    {
        sleep(1);
        $this->validate();
    }
}

?>

<div>
<x-markdown class="markdown">
# Form

Submit this example form and you will get for free:

- Validation errors based on `wire:model`.
- Button spinner base on `target` action.

<br>
</x-markdown>

<x-code>
@verbatim
<x-form wire:submit="save">
    <x-input label="Name" wire:model="name" hint="Full name" />
    <x-input label="E-mail" wire:model="email" icon="o-envelope" placeholder="Personal email" />
    <x-slot:actions>
        <x-button label="Cancel" />
        <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
    </x-slot:actions>
</x-form>
@endverbatim
</x-code>
</div>