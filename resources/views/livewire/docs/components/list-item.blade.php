<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('List Item')] class extends Component
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

By default it will lookup for:

- `$object->name` as main value.
-  `$object->avatar` as picture url.

<br>
</x-markdown>

<x-code>
@verbatim
@php
    $users = App\Models\User::take(3)->get();
@endphp 

@foreach($users as $user)
    <x-list-item :item="$user" link="/docs/installation" />
@endforeach
@endverbatim
</x-code>

<x-markdown >
### Slots and other attributes

You can override all slots. It also supports nested properties.
<br>
</x-markdown>

<x-code>
@verbatim
@php
    $user1 = App\Models\User::inRandomOrder()->first();
    $user2 = App\Models\User::inRandomOrder()->first();    
@endphp 

<!-- Note `city.name`. It supports nested properties -->
<x-list-item :item="$user1" value="other_name" sub-value="city.name" avatar="other_avatar" />    

<!-- All slots -->
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