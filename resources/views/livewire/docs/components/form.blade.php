<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Form')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI form component with builtin validation, spinner, money/currency and actions slot.'])]
class extends Component {
    public string $name = '';

    public ?float $amount = null;

    public ?string $email = null;

    public ?int $age = null;

    public function save()
    {
        sleep(1);

        $this->validate([
            'name' => 'required|min:20',
            'amount' => 'required|decimal:0,2'
        ]);
    }

    public function save2()
    {
        sleep(1);

        $this->validate([
            'email' => 'required|email',
            'age' => 'required|integer'
        ]);
    }

    public function with(): array
    {
        return [
            'description' => 'xxxxxxxx'
        ];
    }
}

?>

<div class="docs">
    <x-anchor title="Form" />

    <x-anchor title="Basics" size="text-2xl" class="mt-10 mb-5" />

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

    <x-anchor title="Error bag" size="text-2xl" class="mt-10 mb-5" />
    <p>
        As you can see above, all validation errors are automatically displayed for each input.
        Additionally, you can display <strong>entire error bag</strong> or <strong>omit</strong> error handling for some inputs.
    </p>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save2">
                {{-- Full error bag --}}
                {{-- All attributes are optional, remove it and give a try--}}
                <x-errors title="Oops!" description="Please, fix them." icon="o-face-frown" />

                <x-input label="Age" wire:model="age" />

                {{-- Notice `omit-error`--}}
                <x-input label="E-mail" wire:model="email" hint="It will omit error here" omit-error />

                <x-slot:actions>
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save2" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>
</div>
