<div>

<x-layouts.app>
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
### Slots

@verbatim
You have full control on rendering rows by using `@scope('cell_xxx', $object)` slot helper blade directive. 
Where `xxx` is any `key` declared on `$headers` object.  

It will inject current `$object` on loop context and achieves same behavior you expect from Vue/React scoped slots.

@endverbatim

In the following example:

- Slot `cell_name` refers to `'key' => 'name'`.
- Slot `cell_city.name` refers to `key => 'city.name'` 

<br>
</x-markdown>


<x-code>
@verbatim
@php 
    $users = App\Models\User::with('city')->take(5)->get();

    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Nice Name'],
        ['key' => 'city.name', 'label' => 'City'], # <---- dot notation for relationship
        ['key' => 'fakeColumn', 'label' => 'Fake City'] # <---- this column does not exists
    ];    
@endphp

<x-table :headers="$headers" :rows="$users">    
    
    <!-- Note `$user` is the current item on iterator -->
    @scope('cell_id', $user)
        <strong>{{ $user->id }}</strong>
    @endscope

    @scope('cell_name', $user)
        <x-badge :value="$user->name" class="badge-info" />
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
        <x-button icon="o-trash" wire:click="delete({{ $user->id }})" class="text-red-500 btn-sm" />
    @endscope
</x-table>
@endverbatim
</x-code>

</x-layouts.app>
</div>
