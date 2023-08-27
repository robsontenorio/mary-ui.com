<?php

use Livewire\Volt\Component;

new class extends Component
{
    public int $selectedUser = 4;

    public int $selectedUser2 = 3;
}

?>

<div>
<x-markdown class="markdown">
# Select

This component is intended to be used as simple native HTML value selection. It will best fit for most use cases on web apps.

</x-markdown>

<x-alert icon="o-light-bulb" class="markdown mb-10">
    If you need a rich selection value interfarce or async search see <a href="/docs/components/choices" wire:navigate>Choices</a> component.
</x-alert>

<x-markdown class="markdown">
### Default attributes
By default it will lookup for:

- `$object->id` for option value.
- `$object->name` for option display label.

<br>
</x-markdown>

<x-code class="grid gap-5"> 
@verbatim
@php
    $users = App\Models\User::take(5)->get();        
@endphp

<x-select label="Master user" icon="o-user" :options="$users" wire:model="selectedUser" /> 

<x-select label="Master user" icon="o-user" :options="$users" wire:model="selectedUser" inline /> 

<x-select label="Right icon" icon-right="o-user" :options="$users" wire:model="selectedUser" /> 
@endverbatim
</x-code>

<x-markdown>
### Alternative attributes

Just set `option-value` and `option-label`  representing desired targets.

</x-markdown>

<x-code class="grid gap-5"> 
@verbatim
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
</div>