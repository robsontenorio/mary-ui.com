<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Group')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI group component.'])]
class extends Component {
    public int $selectedUser = 1;

    public int $selectedUser2;

    public int $selectedUser3;
}

?>

<div class="docs">
    <x-anchor title="Group" />

    <x-anchor title="Default attributes" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
    </ul>

    <br>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(3)->get();
            @endphp

            <x-group label="Select one" :options="$users" wire:model="selectedUser" />

        @endverbatim
    </x-code>

    <x-anchor title="Alternative attributes" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing the desired targets.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(3)->get();
            @endphp

            <x-group
                label="Select one"
                :options="$users"
                option-value="custom_key"
                option-label="other_name"
                wire:model="selectedUser2"
                hint="Choose wisely"
                class="bg-orange-50 [&:checked]:!bg-orange-200 !border-orange-500 !text-orange-500" />
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

            <x-group label="Select one" :options="$users" wire:model="selectedUser3" />
        @endverbatim
    </x-code>

</div>
