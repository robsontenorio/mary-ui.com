<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Select')] class extends Component {
    public int $selectedUser = 4;

    public int $selectedUser2 = 3;

    public int $selectedUser3 = 0;
}

?>

<div class="docs">
    <x-anchor title="Select" />

    <p>
        This component is intended to be used as simple native HTML value selection. It will best fit for most use cases on web apps.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need a rich selection value interface or async search see <a href="/docs/components/choices" wire:navigate>Choices</a> component.
    </x-alert>

    <x-anchor title="Default attributes" size="text-2xl" class="mt-10 mb-5" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
    </ul>

    <br>

    <x-code class="grid gap-5">
        @verbatim('docs')
            @php
                $users = App\Models\User::take(5)->get();
            @endphp

            <x-select label="Master user" icon="o-user" :options="$users" wire:model="selectedUser" />

            <x-select label="Right icon" icon-right="o-user" :options="$users" wire:model="selectedUser" />

            <x-select label="Master user" icon="o-user" :options="$users" wire:model="selectedUser" inline />
        @endverbatim
    </x-code>

    <x-anchor title="Alternative attributes" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing desired targets.
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
                placeholder="Select an user"
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
</div>
