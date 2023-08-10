{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Select

### Default attributes

It will lookup for `id` (as key) and `name` (as value).
</x-markdown>

<x-code class="grid gap-5"> 
    @verbatim
    @php
        $options = App\Models\User::factory()->times(5)->create();        
    @endphp
    
    <x-select label="Master user" icon="o-user" :options="$options" wire:model="selectedUser" /> 
    @endverbatim
</x-code>

<x-markdown>
### Alternative attributes

Just set `key` and `value`  representing the columns.

</x-markdown>

<x-code class="grid gap-5"> 
    @verbatim
    @php
    $options = App\Models\User::factory()
                ->times(5)
                ->create()
                ->each(function($item){
                    $item->other_value = $item->name;
                    $item->other_key = $item->id;
                });
    @endphp 

    <x-select 
        label="Alternative" 
        :options="$options" 
        key="other_key" 
        value="other_value" 
        placeholder="Select an user" 
        wire:model="selectedUser" />
    @endverbatim
</x-code>


</x-layouts.app>
{{-- blade-formatter-enable --}}
