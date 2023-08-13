<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    #[Rule('required|min:20')]
    public $name = '';

    #[Rule('required|email')]
    public $email = '';

    #[Rule('required|decimal:0,2')]
    public $amount = '';

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

Once you submit a form you get for free:

- Validation errors based on `wire:model`.
- Button spinner based on `target` action.
- Auto unmask `money` inputs for nice validation.

<br>
</x-markdown>

<x-code>
@verbatim
<x-form wire:submit="save">
    <x-input label="Name" wire:model="name" hint="Full name" />
    <x-input label="E-mail" wire:model="email" icon="o-envelope" placeholder="Personal email" />
    <x-input label="Amount" wire:model="amount" prefix="US" money hint="It submits an unmasked value" />    

    <x-slot:actions>
        <x-button label="Cancel" />
        <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
    </x-slot:actions>
</x-form>
@endverbatim
</x-code>
</div>