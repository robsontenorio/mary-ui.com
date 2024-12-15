<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Radio')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI radio component with builtin validation support.'])]
class extends Component {
    public int $user1 = 1;

    public int $user2 = 1;

    public int $user3 = 1;

    public string $user4;

    public int $user5 = 1;
}

?>

<div class="docs">

    <x-anchor title="Radio" />

    <x-anchor title="Default attributes" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
    </ul>

    <br>

    <x-code class="grid gap-8 lg:flex justify-around">
        @verbatim('docs')
            @php
                $users = App\Models\User::take(3)->get();
            @endphp

            <x-radio label="Select one" :options="$users" wire:model="user1" />

            <x-radio label="Select one" :options="$users" wire:model="user2" inline />

        @endverbatim
    </x-code>

    <x-anchor title="Hint" size="text-2xl" class="mt-10 !mb-5" />

    <x-code>
        @verbatim('docs')
            @php
                $users = [
                    ['id' => 1 , 'name' => 'Mary', 'hint' => 'I am Mary' ],
                    ['id' => 2 , 'name' => 'Joe', 'hint' => 'I am Joe' ],
                ];
            @endphp

            <x-radio label="Select one" :options="$users" wire:model="user3" />
        @endverbatim
    </x-code>

    <x-anchor title="Alternative attributes" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing the desired targets.
    </p>

    <x-code>
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
                option-value="custom_key"
                option-label="other_name"
                option-hint="my_hint"
                wire:model="user4"
                class="radio-sm" />
        @endverbatim
    </x-code>

    <x-anchor title="Disable options" size="text-2xl" class="mt-10 !mb-5" />
    <p>
        You can disable options by setting the <code>disabled</code> attribute.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $users = [
                    ['id' => 1, 'name' => 'John'],
                    ['id' => 2, 'name' => 'Doe'],
                    ['id' => 3, 'name' => 'Mary', 'disabled' => true],
                    ['id' => 4, 'name' => 'Kate'],
                ];
            @endphp

            <x-radio
                label="Select one" :options="$users" wire:model="user5" />
        @endverbatim
    </x-code>

</div>
