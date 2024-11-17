<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Validator;

new
#[Title('Form')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI form component with builtin validation, spinner, money/currency and actions slot.'])]
class extends Component {
    public string $name = '';

    public ?float $amount = null;

    public ?string $signature1 = null;

    public ?string $address = null;

    public ?int $number = null;

    public ?string $email = null;

    public ?int $age = null;

    public ?string $magicWord1 = null;

    public ?string $pin = null;

    public ?string $magicWord2 = null;

    public ?int $salary = null;

    public ?string $full_name = null;

    public ?string $password = null;

    public ?int $estado = null;

    public ?int $item1 = null;

    public ?int $item2 = null;

    public array $state = [
        'name' => null,
        'amount' => null,
        'multiple' => null
    ];

    public function save(): void
    {
        //sleep(1);

        $this->validate([
            'name' => 'required|min:20',
            'amount' => 'required|decimal:0,2',
            'estado' => 'required',
            'password' => 'required|min:6',
            'item1' => 'required',
            'item2' => 'required'

        ]);
    }

    public function save2(): void
    {
        sleep(1);

        $this->validate([
            'address' => 'required|min:20',
            'number' => 'required|integer'
        ]);
    }

    public function save3(): void
    {
        sleep(1);

        $this->validate([
            'magicWord1' => 'starts_with:Hello|ends_with:world',
            'magicWord2' => 'starts_with:Hello|ends_with:world',
        ]);
    }

    public function save4(): void
    {
        sleep(1);

        $this->addError('total_salary', 'This is a custom error message for total salary field.');
    }

    public function save5(): void
    {
        sleep(1);

        $this->validate([
            'full_name' => 'required|min:20',
        ]);
    }

    public function save6(): void
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
            'users' => User::take(5)->get()
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

    <x-alert icon="o-light-bulb" class="my-5">
        Make sure to add <a href="https://mary-ui.com/docs/components/input#currency">Currency</a> library to make money
        input work.
    </x-alert>

    <br>

    @php
        $config1 = ['altFormat' => 'm/d/Y'];
        $config2 = ['mode' => 'range'];
    @endphp

    <x-form wire:submit="save">
        <x-input label="Name" wire:model="name" class="input-primary" />

        <x-input label="Amount" wire:model="amount" prefix="USD" money hint="It submits an unmasked value" class="input-primary" />

        <x-password label="Password" wire:model="password" class="input-primary" disabled />

        <x-toggle label="Left" wire:model="item1" class="toggle-primary" />

        <x-checkbox label="Left" wire:model="item1" hint="You agree with terms" class="checkbox-primary" />

        <x-radio label="Select one" :options="$users" wire:model="item2" class="radio-primary" />

        <x-group label="Select one" :options="$users" wire:model="item1" />

        <x-colorpicker wire:model="name" class="input-primary" />

        <x-datetime label="My date" wire:model="name" icon="o-calendar" class="input-primary" />

        <x-datetime label="Date + Time" wire:model="name" icon-right="o-calendar" type="datetime-local" class="input-primary" />

        <x-file wire:model="name" label="Receipt" hint="Only PDF" accept="application/pdf" class="file-primary" />

        <x-datetime label="Time" wire:model="name" icon="o-calendar" type="time" class="input-primary" />

        <x-textarea label="Bio" wire:model="name" placeholder="Your story ..." hint="Max 1000 chars" rows="5" inline class="textarea-primary" />

        @dump($pin)
        <x-pin wire:model="pin" size="3" class="input-primary text-sm !bg-red-50" />

        <x-signature wire:model="signature1" hint="Please, sign it." />

        <x-datepicker label="Date" wire:model="name" icon="o-calendar" hint="Hi!" class="input-primary" />
        <x-datepicker label="Alt" wire:model="name" icon="o-calendar" :config="$config1" class="input-primary" />
        <x-datepicker label="Range" wire:model="name" icon="o-calendar" :config="$config2" inline class="input-primary" />

        <x-input label="Prepend a select" wire:model="name" class="input-primary">
            <x-slot:prepend>
                {{-- Add `rounded-e-none` class (RTL support) --}}
                <x-select icon="o-user" :options="$users" class="rounded-e-none select-primary" />
            </x-slot:prepend>
        </x-input>

        <x-input label="Append a button" wire:model="name" class="input-primary">
            <x-slot:append>
                {{-- Add `rounded-s-none` class (RTL support) --}}
                <x-button label="I am a button" icon="o-check" class="btn-primary rounded-s-none" />
            </x-slot:append>
        </x-input>

        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>

    <x-anchor title="No `separator`" size="text-2xl" class="mt-10 mb-5" />

    <p>
        To avoid having the separator line above the actions slot, add <code>no-separator</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save" no-separator>
                <x-input label="Name" wire:model="name" />

                <x-slot:actions>
                    <x-button label="Cancel" />
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    <x-anchor title="Custom error field" size="text-2xl" class="mt-10 mb-5" />
    <p>
        By default, it uses the model name to retrieve the validation errors. If you want to display validation errors for a custom error field, you can use the
        <code>error-field</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save4">
                {{-- Notice `error_field` --}}
                <x-input label="Custom error field" wire:model="salary" error-field="total_salary" />

                <x-slot:actions>
                    <x-button label="Cancel" />
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save4" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            $this->addError('total_salary', 'This is a custom error message for total salary field.');
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Omit errors" size="text-2xl" class="mt-10 mb-5" />
    <p>
        If for some reason you want to omit the error message, you can use the <code>omit-error</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save2">
                <x-input label="Address" wire:model="address" />

                {{-- Notice `omit-error` --}}
                <x-input label="Number" wire:model="number" omit-error hint="This is required, but we suppress the error message" />

                <x-slot:actions>
                    <x-button label="Cancel" />
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save2" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    <x-anchor title="First message only" size="text-2xl" class="mt-10 mb-5" />
    <p>
        If you have multiple validation messages for the same filed and want to show only the first error message, you can use the <code>first-error-only</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save3">
                <x-input label="Magic word 1" wire:model="magicWord1" />

                {{-- Notice `first-error-only`--}}
                <x-input label="Magic word 2" wire:model="magicWord2" first-error-only />

                <x-slot:actions>
                    <x-button label="Cancel" />
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save3" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            $this->validate([
            'magicWord1' => 'starts_with:Hello|ends_with:world',
            'magicWord2' => 'starts_with:Hello|ends_with:world',
            ]);
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Custom error style" size="text-2xl" class="mt-10 mb-5" />
    <p>
        You can customize the error message style by using the <code>error-class</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save5">
                {{--  Custom CSS class. Remeber to configure Tailwind safelist --}}
                <x-input label="Full name" wire:model="full_name" error-class="bg-blue-500 p-1" />

                <x-slot:actions>
                    <x-button label="Cancel" />
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save5" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    <x-anchor title="Full error bag" size="text-2xl" class="mt-10 mb-5" />
    <p>
        As you can see above, all validation errors are automatically displayed for each input.
        Additionally, you can display <strong>entire error bag</strong> with <code>x-errors</code> component.
    </p>

    <x-alert icon="o-light-bulb" class="my-5">
        Currently, it <strong>does not work</strong> with multiple forms on same screen.
    </x-alert>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save6">
                {{-- Full error bag --}}
                {{-- All attributes are optional, remove it and give a try--}}
                <x-errors title="Oops!" description="Please, fix them." icon="o-face-frown" />

                <x-input label="Age" wire:model="age" />
                <x-input label="E-mail" wire:model="email" />

                <x-slot:actions>
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save6" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>
</div>
