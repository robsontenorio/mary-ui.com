{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Radio

### Default attributes

It will lookup for `id` (as key) and `name` (as value).
</x-markdown>

<x-code>
    @verbatim        
    @php
        $options = App\Models\User::take(3)->get();
    @endphp

    <x-radio label="Select one" :options="$options" wire:model="selectedUser" />
    @endverbatim
</x-code>


<x-markdown>
### Alternative attributes

Just set `key` and `value`  representing the columns.

</x-markdown>

<x-code>
    @verbatim        
    @php
        $options = App\Models\User::take(3)->get()->each(function($item){
                    $item->other_value = $item->name;
                    $item->other_key = $item->id;
                });
    @endphp

    <x-radio 
        label="Select one" 
        :options="$options" 
        key="other_key" 
        value="other_value" 
        wire:model="selectedUser2" 
        class="bg-blue-50"/>
    @endverbatim
</x-code>


</x-layouts.app>
{{-- blade-formatter-enable --}}
