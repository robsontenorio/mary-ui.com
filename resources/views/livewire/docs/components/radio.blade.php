<?php

use Livewire\Volt\Component;

new class extends Component
{
    public int $selectedUser = 1;

    public int $selectedUser2;
}

?>

<div>
<x-markdown class="markdown">
# Radio

### Default attributes

It will lookup for:

- `$object->id` for option value.
- `$object->name` for option display label.

<br>
</x-markdown>

<x-code>
@verbatim        
@php
    $users = App\Models\User::take(3)->get();
@endphp

<x-radio label="Select one" :options="$users" wire:model="selectedUser" />

@endverbatim
</x-code>


<x-markdown>
### Alternative attributes

Just set `option-value` and `option-label`  representing desired targets.

</x-markdown>

<x-code>
@verbatim        
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
    class="bg-blue-50"/>
@endverbatim
</x-code>

</div>