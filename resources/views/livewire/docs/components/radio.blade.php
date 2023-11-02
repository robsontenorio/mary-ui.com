<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Radio')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI radio component with builtin validation support.'])]
class extends Component {
    public int $selectedUser = 1;

    public int $selectedUser2;
}

?>

<div class="docs">
    <x-anchor title="Radio" />

    <x-anchor title="Default attributes" size="text-2xl" class="mt-10 mb-5" />

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

            <x-radio label="Select one" :options="$users" wire:model="selectedUser" />

        @endverbatim
    </x-code>

    <x-anchor title="Alternative attributes" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing the desired targets.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(3)->get();
            @endphp

            <x-radio
                label="Select one"
                :options="$users"
                option-value="custom_key"
                option-label="other_name"
                wire:model="selectedUser2"
                hint="Choose wisely"
                class="bg-red-50" />
        @endverbatim
    </x-code>
</div>
