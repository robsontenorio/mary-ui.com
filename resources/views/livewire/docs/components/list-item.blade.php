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

<x-markdown>
# List Item
</x-markdown>

<x-code>
@verbatim
@php
    $item = new App\Models\User([
        'id' => 1,
        'name' => 'Mary Jane',
        'email' => 'mary@jane.com',
        'avatar' => 'https://picsum.photos/200?='.now(),
        'other_avatar' => 'https://picsum.photos/200?x=1',
        'other_name' => 'Carl Silver',
        'other_subvalue' => 'carl@news.com'
    ]);
@endphp 

<x-list-item :item="$item" link="/docs/installation" />

<x-list-item :item="$item" value="other_name" sub-value="email" avatar="other_avatar" />    

<x-list-item :item="$item" sub-value="email" no-separator>
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