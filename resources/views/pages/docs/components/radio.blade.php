{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Radio

### Default attributes

It will lookup for:

- `object.id` for option value
- `object.name` for option display label 

<br>
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

Just set `option-value` and `option-label`  representing desired targets.

</x-markdown>

<x-code>
    @verbatim        
    @php
        $options = App\Models\User::take(3)->get()->each(function($item){
                    $item->other_value = $item->id;
                    $item->other_label = $item->name;
                });
    @endphp

    <x-radio 
        label="Select one" 
        :options="$options" 
        option-value="other_value" 
        option-label="other_label" 
        wire:model="selectedUser2" 
        hint="Choose wisely"
        class="bg-blue-50"/>
    @endverbatim
</x-code>


</x-layouts.app>
{{-- blade-formatter-enable --}}
