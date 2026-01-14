<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Group')]
#[Layout('layouts.app', ['description' => 'Livewire UI group component.'])]
class extends Component {
    public int $selectedUser = 1;

    public int $selectedUser2 = 1;

    public int $selectedUser3 = 1;
}

?>

<div class="docs">
    <x-anchor title="Group" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need a classic radio check the <a href="/docs/components/radio" wire:navigate>Radio</a> component.
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

    <x-code-example>
        @verbatim('docs')
            @php     // [tl! .docs-hide:2]
                $users = App\Models\User::take(3)->get();
            @endphp
            <x-group label="Select one" wire:model="selectedUser" :options="$users" hint="Pick one" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Alternative attributes" size="text-xl" class="mt-14" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing the desired targets.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php     // [tl! .docs-hide:2]
                $users = App\Models\User::take(3)->get();
            @endphp
            <x-group
                label="Select one"
                :options="$users"
                wire:model="selectedUser2"
                option-value="custom_key"
                option-label="other_name"
                class="[&:checked]:!btn-primary btn-sm" />
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
                    ['id' => 3, 'name' => 'Mary', 'disabled' => true],  // <-- This
                    ['id' => 4, 'name' => 'Kate'],
                ];
            @endphp

            <x-group label="Select one" wire:model="selectedUser3" :options="$users" />
        @endverbatim
    </x-code-example>

</div>
