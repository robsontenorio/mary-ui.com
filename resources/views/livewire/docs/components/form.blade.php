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

    public $state = [
        'name'     => null,
        'amount'   => null,
        'multiple' => null
    ];

    public function save() {
        sleep(1);

        $this->validate([
            'name'   => 'required|min:20',
            'amount' => 'required|decimal:0,2'
        ]);
    }

    public function save2() {
        sleep(1);

        $this->validate([
            'email' => 'required|email',
            'age'   => 'required|integer'
        ]);
    }

    public function save3() {
        sleep(1);

        \Illuminate\Support\Facades\Validator::make($this->state, [
            'name'     => 'required|min:20',
            'amount'   => 'required|decimal:0,2',
            'multiple' => 'required|starts_with:Hello|ends_with:world',
        ])->validate();
    }
}

?>

<div class="docs">
    <x-anchor title="Form"/>

    <x-anchor title="Basics" size="text-2xl" class="mt-10 mb-5"/>

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

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save">
                <x-input label="Name" wire:model="name"/>
                <x-input label="Amount" wire:model="amount" prefix="USD" money hint="It submits an unmasked value"/>

                <x-slot:actions>
                    <x-button label="Cancel"/>
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save"/>
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    <x-anchor title="Validation Error Attributes" size="text-2xl" class="mt-10 mb-5"/>
    <p>
        All input components in this library support various attributes to customize validation error behavior and
        appearance. By default, components search for validation errors in the default error bag corresponding to the
        <code>wire:model</code> property name.
    </p>
    <p>
        To tailor the validation error handling to your needs, the following attributes are available:
    </p>
    <ul class="list-disc pl-5 mb-4">
        <li><strong>error-bag</strong>: Specifies the name of the error bag to be referenced. Supports both specific
            attribute values and wildcard patterns (e.g.,<code>state.val</code> or <code>val.*</code>).
        </li>
        <li><strong>omit-error</strong>: When set to <code>true</code>, the component's border will be highlighted
            without displaying the error text.
        </li>
        <li><strong>first-error-only</strong>: Setting this to <code>true</code> ensures that only the first encountered
            error is displayed.
        </li>
        <li><strong>error-class</strong>: Provides an option to override the CSS classes for the error message div.</li>
    </ul>

    <x-anchor title="Default Values" size="text-2xl" class="mt-10 mb-5"/>
    <p>The following are the default values for each attribute:</p>
    <ul class="list-disc pl-5 mb-4">
        <li><code>error-bag</code> defaults to <code>$modelName()</code>.</li>
        <li><code>omit-error</code> is <code>false</code> by default, meaning error texts are shown.</li>
        <li><code>first-error-only</code> is set to <code>false</code>, allowing all relevant errors to be displayed.
        </li>
        <li>The default <code>error-class</code> is <code>'text-red-500 label-text-alt p-1'</code>.</li>
    </ul>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save3">
                <x-input label="Name" wire:model="state.name" error-bag="name"/>
                <x-input label="Amount" wire:model="state.amount" prefix="USD" money hint="It submits an unmasked value"
                         error-bag="amount" :omit-error="true"/>

                <x-input label="Multiple Messages" wire:model="state.multiple" error-bag="multiple"/>
                <x-input label="One Message" wire:model="state.multiple" error-bag="multiple" :first-error-only="true"/>

                <x-input label="Blue text" wire:model="state.multiple" error-bag="multiple"
                         error-class="text-blur-500 label-text-alt p-1"/>

                <x-slot:actions>
                    <x-button label="Cancel"/>
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save3"/>
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    <x-anchor title="Error bag" size="text-2xl" class="mt-10 mb-5"/>
    <p>
        As you can see above, all validation errors are automatically displayed for each input.
        Additionally, you can display <strong>entire error bag</strong> or <strong>omit</strong> error handling for some
        inputs.
    </p>

    <p>
        Currently, it <strong>does not work</strong> with multiple forms on same screen.
    </p>

    <x-code>
        @verbatim('docs')
            <x-form wire:submit="save2">
                {{-- Full error bag --}}
                {{-- All attributes are optional, remove it and give a try--}}
                <x-errors title="Oops!" description="Please, fix them." icon="o-face-frown"/>

                <x-input label="Age" wire:model="age"/>

                {{-- Notice `omit-error`--}}
                <x-input label="E-mail" wire:model="email" hint="It will omit error here" omit-error/>

                <x-slot:actions>
                    <x-button label="Click me!" class="btn-primary" type="submit" spinner="save2"/>
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>
</div>
