<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Radio')]
#[Layout('layouts.app', ['description' => 'Livewire UI radio component with builtin validation support.'])]
class extends Component {
    public int $user1 = 1;

    public int $user2 = 1;

    public int $user3 = 1;

    public int $user4 = 1;

    public int $user5 = 1;

    public int $user6 = 1;
}

?>

<div class="docs">

    <x-anchor title="Radio" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Alternatively check the <a href="/docs/components/group" wire:navigate>Group</a> component.
    </x-alert>

    <x-anchor title="Default attributes" size="text-xl" class="mt-14" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
    </ul>

    <br>

    <x-code-example class="grid gap-8 lg:flex lg:justify-around">
        @verbatim('docs')
            @php                                            // [tl! .docs-hide]
                $users = App\Models\User::take(3)->get();   // [tl! .docs-hide]
            @endphp                                         {{-- [tl! .docs-hide]--}}
            <x-radio label="Select one" wire:model="user1" :options="$users" />

            <x-radio label="Select one inline" wire:model="user2" :options="$users" inline />
        @endverbatim
    </x-code-example>

    <x-anchor title="Hint" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-8 lg:flex lg:justify-around">
        @verbatim('docs')
            @php
                $users = [
                    ['id' => 1 , 'name' => 'Administrator', 'hint' => 'Can do anything.' ],
                    ['id' => 2 , 'name' => 'Editor', 'hint' => 'Can not delete.' ],
                ];
            @endphp

            <x-radio label="Select one option" wire:model="user3" :options="$users" />

            <x-radio label="Select one option" wire:model="user4" :options="$users" inline />
        @endverbatim
    </x-code-example>

    <x-anchor title="Alternative attributes" size="text-xl" class="mt-14" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing the desired targets.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php
                $users = [
                    ['custom_key' => 's134' , 'other_name' => 'Mary', 'my_hint' => 'I am Mary' ],
                    ['custom_key' => 'f782' , 'other_name' => 'Joe', 'my_hint' => 'I am Joe' ],
                ];
            @endphp

            <x-radio
                label="Select one"
                :options="$users"
                wire:model="user5"
                option-value="custom_key"
                option-label="other_name"
                option-hint="my_hint"
            />
        @endverbatim
    </x-code-example>

    <x-anchor title="Disable options" size="text-xl" class="mt-14" />
    <p>
        You can disable options by setting the <code>disabled</code> attribute.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php
                $users = [
                    ['id' => 1, 'name' => 'John'],
                    ['id' => 2, 'name' => 'Doe'],
                    ['id' => 3, 'name' => 'Mary', 'disabled' => true],
                    ['id' => 4, 'name' => 'Kate'],
                ];
            @endphp

            <x-radio label="Select one" :options="$users" wire:model="user6" />
        @endverbatim
    </x-code-example>

</div>
