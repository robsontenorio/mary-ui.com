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
    zebra     
    @row-click="alert($event.detail.name)" />
@endverbatim
</x-code>

<x-markdown class="markdown">
### Slots

We just provide a helper blade directive @verbatim `@scope`/`@endscope` for context `$item` injection on loop. @endverbatim
It will achieve same behavior what you expect from Vue/React components scoped slots.

Just call @verbatim `@slot('cell_xxx')` @endverbatim where `xxx` is any `key` declared on `$headers` object.

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
