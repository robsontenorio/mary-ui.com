<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new
#[Title('Select')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI native select component with icon and disabled option state.'])]
class extends Component {
    #[Validate('required')]
    public int $selectedUser = 4;

    #[Validate('required')]
    public ?int $selectedUser2 = null;

    #[Validate('required')]
    public int $selectedUser3 = 0;

    public function save()
    {
        $this->validate();
    }

    public function with()
    {
        return [
            'users' => App\Models\User::take(5)->get()
        ];
    }
}

?>

<div class="docs">
    <x-anchor title="Select" />

    <p>
        This component is intended to be used as a simple native HTML value selection. It will best fit for most use cases on web apps.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need a rich selection value interface or async search check the <a href="/docs/components/choices" wire:navigate>Choices</a> component.
    </x-alert>

    <x-anchor title="Default attributes" size="text-2xl" classf="mt-10 mb-5" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
    </ul>

    <br>

    <x-form wire:submit="save">
        <x-select label="Master user" icon="o-user" :options="$users" wire:model="selectedUser" />

        <x-select label="Right icon" icon-right="o-user" :options="$users" wire:model="selectedUser" />

        <x-select label="Disabled" :options="$users" wire:model="selectedUser" disabled />

        <x-select label="Master user" icon="o-user" :options="$users" wire:model="selectedUser" inline />

        <x-select
            label="Alternative"
            :options="$users"
            option-value="custom_key"
            option-label="other_name"
            placeholder="Select a user"
            hint="Select one, please."
            class="select-primary"
            wire:model="selectedUser2" />

        <x-select label="Slots" wire:model="selectedUser2" :options="$users" single placeholder="Select a user">
            <x-slot:prepend>
                {{--  Add `rounded-e-none` (RTL support) --}}
                <x-button icon="o-trash" class="rounded-e-none" />
            </x-slot:prepend>
            <x-slot:append>
                {{--  Add `rounded-s-none` (RTL support) --}}
                <x-button label="Create" icon="o-plus" class="rounded-s-none btn-primary" />
            </x-slot:append>
        </x-select>
        <x-button label="Submit" class="btn-primary" type="submit" />
    </x-form>

    <x-anchor title="Alternative attributes" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing the desired targets.
    </p>

    <x-code class="grid gap-5">
        @verbatim('docs')
            @php
                $users = App\Models\User::take(5)->get();
            @endphp

            <x-select
                label="Alternative"
                :options="$users"
                option-value="custom_key"
                option-label="other_name"
                placeholder="Select a user"
                placeholder-value="0" {{-- Set a value for placeholder. Default is `null` --}}
                hint="Select one, please."
                wire:model="selectedUser2" />
        @endverbatim
    </x-code>

    <x-anchor title="Disable options" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-5">
        @verbatim('docs')
            @php
                $users = [
                    [
                        'id' => 1,
                        'name' => 'Joe'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Mary',
                        'disabled' => true
                    ]
                ];
            @endphp

            <x-select label="Disabled options" :options="$users" wire:model="selectedUser3" />
        @endverbatim
    </x-code>

    <x-anchor title="Slots" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can <strong>append or prepend</strong> anything like this. Make sure to use appropriated css round class on left or right.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(5)->get();
            @endphp

            <x-select label="Slots"  :options="$users" single>
                <x-slot:prepend>
                    {{--  Add `rounded-e-none` (RTL support) --}}
                    <x-button icon="o-trash" class="rounded-e-none" />
                </x-slot:prepend>
                <x-slot:append>
                    {{--  Add `rounded-s-none` (RTL support) --}}
                    <x-button label="Create" icon="o-plus" class="rounded-s-none btn-primary" />
                </x-slot:append>
            </x-select>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Group" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This component uses the native HTML grouped select.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $grouped = [
                    'Admins' => [
                        ['id' => 1, 'name' => 'Mary'],
                        ['id' => 2, 'name' => 'Giovanna'],
                        ['id' => 3, 'name' => 'Marina']
                     ],
                    'Users' => [
                        ['id' => 4, 'name' => 'John'],
                        ['id' => 5, 'name' => 'Doe'],
                        ['id' => 6, 'name' => 'Jane']
                    ],
                ];
            @endphp

            <x-select-group label="Group Select Demo" :options="$grouped" wire:model="selectedUser" />
        @endverbatim
    </x-code>
    {{--@formatter:on--}}
</div>
