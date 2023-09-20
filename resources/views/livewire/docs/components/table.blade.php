<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Table')] class extends Component
{
    public function delete()
    {
        sleep(1);
    }
}
?>
<div>

<x-markdown>
# Table
</x-markdown>

<x-code>
@verbatim
@php 
    $users = App\Models\User::with('city')->take(5)->get();

    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Nice Name'],
        ['key' => 'city.name', 'label' => 'City'] # <---- dot notation for relationship
    ];    
@endphp

<!-- Of course you can use any `$wire.METHOD` on `@row-click` -->
<x-table 
    :headers="$headers" 
    :rows="$users" 
    striped     
    @row-click="alert($event.detail.name)" />
@endverbatim
</x-code>

<x-markdown class="markdown">
### Slots and other settings

@verbatim
You have full control on rendering **rows** by using `@scope('cell_xxx', $object)` or **headers** by using `@scope('header_xxx', $object)` slot helper blade directive. 
Where `xxx` is any `key` declared on `$headers` config object.  

It will inject current `$object` on loop context and achieves same behavior you expect from Vue/React scoped slots.

@endverbatim

In the following example:

- Slot `cell_name` refers to `'key' => 'name'`
- Slot `cell_city.name` refers to `key => 'city.name'` 
- Slot `header_id` refers to `key` => `id`

<br>
</x-markdown>


<x-code>
@verbatim
@php 
    $users = App\Models\User::with('city')->take(5)->get();

    $headers = [
        ['key' => 'id', 'label' => '#', 'class' => 'bg-red-100'], # <--- custom CSS
        ['key' => 'name', 'label' => 'Nice Name'],
        ['key' => 'city.name', 'label' => 'City'], # <---- dot notation for relationship
        ['key' => 'fakeColumn', 'label' => 'Fake City'] # <---- this column does not exists
    ];    
@endphp

<x-table :headers="$headers" :rows="$users">    
    
    <!-- Note `$header` is current header item on loop -->
    @scope('header_name', $header)
        <div class="tooltip tooltip-bottom cursor-pointer" data-tip="The cool name">
            {{ $header['label'] }} <x-icon name="s-question-mark-circle"  />
        </div>
    @endscope
    
    <!-- Note `$user` is the current row item on loop -->
    @scope('cell_id', $user)
        <strong>{{ $user->id }}</strong>
    @endscope

    <!-- You can choose any name for injected object  -->
    @scope('cell_name', $stuff)
        <x-badge :value="$stuff->name" class="badge-info" />
    @endscope

    <!-- Note `dot` notation for relatioship cell slot -->
    @scope('cell_city.name', $user)
        <i>{{ $user->city->name }}</i>
    @endscope

    <!-- The `fakeColumn` does not exist on `$user` object -->
    @scope('cell_fakeColumn', $user)
        <u>{{ $user->city->name }}</u>
    @endscope

    <!-- Special `actions` slot -->
    @scope('actions', $user)
        <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
    @endscope
    
</x-table>
@endverbatim
</x-code>
</div>
