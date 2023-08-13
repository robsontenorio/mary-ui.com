<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function delete()
    {
        sleep(1);
    }
}

?>

<div>

<x-markdown class="markdown">
# List Item

It will lookup for:

- `$object->name` as main value.
-  `$object->avatar` as picture url.

<br>
</x-markdown>

<x-code>
@verbatim
@php
    $user1 = App\Models\User::inRandomOrder()->first();
    $user2 = App\Models\User::inRandomOrder()->first();
    $user3 = App\Models\User::inRandomOrder()->first();
@endphp 

<x-list-item :item="$user1" link="/docs/installation" />

<x-list-item :item="$user2" value="other_name" sub-value="other_email" avatar="other_avatar" />    

<x-list-item :item="$user3" sub-value="email" no-separator>
    <x-slot:sub-value>
        Custom stuff here
    </x-slot:sub-value>
    <x-slot:action>
        <x-button icon="o-trash" class="text-red-500" wire:click="delete(1)" spinner />
    </x-slot:action>
</x-list-item>
@endverbatim
</x-code>

</div>