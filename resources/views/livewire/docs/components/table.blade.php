<div>

<x-layouts.app>
<x-markdown>
# Table
</x-markdown>

<x-code>
@verbatim
@php 
    $users = App\Models\User::take(5)->get();

    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Nice Name']
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

<x-markdown>
### Slots

We just provide a helper blade directive @verbatim `@scope`/`@endscope` for context `$item` injection on loop. @endverbatim
It will achieve same behavior what you expect from Vue/React components scoped slots.
</x-markdown>


<x-mockup>
 @php 
    $users = App\Models\User::take(5)->get();

    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Nice Name']
    ];    
@endphp

<x-table  :headers="$headers" :rows="$users">
    <!-- Just use prefix `cell_` + `KEY` declared on `headers`, to override specific cells -->
    @scope('cell_id', $user)
        <strong>{{ $user->id }}</strong>
    @endscope

    @scope('cell_name', $user)
        <x-badge :value="$user->name" class="badge-info" />
    @endscope

    <!-- Special `actions` slot -->
    @scope('actions', $user)
        <x-button icon="o-trash" wire:click="delete({{ $user->id }})" class="text-red-500 btn-sm" />
    @endscope
</x-table>

</x-mockup>

<x-code no-render>
@verbatim
@php 
    $users = App\Models\User::take(5)->get();

    $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Nice Name']
    ];    
@endphp

<x-table  :headers="$headers" :rows="$users">
    <!-- Just use prefix `cell_` + `KEY` declared on `headers`, to override specific cells -->
    @scope('cell_id', $user)
        <strong>{{ $user->id }}</strong>
    @endscope

    @scope('cell_name', $user)
        <x-badge :value="$user->name" class="badge-info" />
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
