<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('List Item')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI list item component with link, avatar and customizable slots.'])]
class extends Component {
    public function delete()
    {
        sleep(1);
    }
}

?>

<div class="docs">
    <x-anchor title="List Item" />

    <p>
        By default, this will look up for:
    </p>

    <ul>
        <li><code>$object->name</code> as the main value.</li>
        <li><code>$object->avatar</code> as the picture url.</li>
    </ul>

    <br>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(3)->get();
            @endphp

            @foreach($users as $user)
                <x-list-item :item="$user" link="/docs/installation" />
            @endforeach
        @endverbatim
    </x-code>

    <x-anchor title="Slots and other attributes" size="text-xl" class="mt-14" />

    <p>
        You can override all slots. It also supports nested properties.
    </p>

    <br>

    <x-code>
        @verbatim('docs')
            @php
                $user1 = App\Models\User::inRandomOrder()->first();
                $user2 = App\Models\User::inRandomOrder()->first();
            @endphp

            {{-- Notice `city.name`. It supports nested properties --}}
            <x-list-item :item="$user1" value="other_name" sub-value="city.name" avatar="other_avatar" />

            {{-- All slots --}}
            <x-list-item :item="$user2" no-separator no-hover>
                <x-slot:avatar>
                    <x-badge value="top user" class="badge-primary" />
                </x-slot:avatar>
                <x-slot:value>
                    Custom value
                </x-slot:value>
                <x-slot:sub-value>
                    Custom sub-value
                </x-slot:sub-value>
                <x-slot:actions>
                    <x-button icon="o-trash" class="text-red-500" wire:click="delete(1)" spinner />
                </x-slot:actions>
            </x-list-item>
        @endverbatim
    </x-code>
</div>
