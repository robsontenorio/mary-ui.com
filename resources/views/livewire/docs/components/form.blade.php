<?php

use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Form')] class extends Component {
    #[Rule('required|min:20')]
    public string $name = '';

    #[Rule('required|decimal:0,2')]
    public ?float $amount = null;

    public function save()
    {
        sleep(1);
        $this->validate();
    }
}

?>

<div class="docs">
    <x-header title="Form" with-anchor />

    <p>
        Once you submit a form you get for free:
    </p>

    <ul>
        <li>Validation errors based on <code>wire:model</code>.</li>
        <li>Button spinner based on <code>target</code> action.</li>
        <li>Auto unmask <code>money</code> inputs for nice validation.</li>
    </ul>

    <br>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save">
                <x-input label="Name" wire:model="name" />
                <x-input label="Amount" wire:model="amount" prefix="USD" money hint="It submits an unmasked value" />
                <x-slot:actions>
                    <x-button label="Cancel" />
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>
</div>
