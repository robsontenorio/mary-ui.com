{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown class="markdown">
# Select

### Default attributes
It will lookup for:

- `object.id` for option value
- `object.name` for option display label 

<br>
</x-markdown>

<x-code class="grid gap-5"> 
    @verbatim
    @php
        $options = App\Models\User::take(5)->get();        
    @endphp
    
    <x-select label="Master user" icon="o-user" :options="$options" wire:model="selectedUser" /> 
    @endverbatim
</x-code>

<x-markdown>
### Alternative attributes

Just set `option-value` and `option-label`  representing desired targets.

</x-markdown>

<x-code class="grid gap-5"> 
    @verbatim
    @php
    $options = App\Models\User::take(5)->get()->each(function($item){
                    $item->other_value = $item->id;
                    $item->other_label = $item->name;
                });
    @endphp 

    <x-select 
        label="Alternative" 
        :options="$options" 
        option-value="other_key" 
        option-label="other_label" 
        placeholder="Select an user" 
        hint="Select one, please."
        wire:model="selectedUser" />
    @endverbatim
</x-code>


</x-layouts.app>
{{-- blade-formatter-enable --}}
