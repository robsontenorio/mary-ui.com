{{-- blade-formatter-disable --}}
<x-layouts.app>

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
            'other_name' => 'Carl Silver'
        ]);
    @endphp 

    <x-list-item :item="$item" />
    
    <x-list-item :item="$item" value="other_name" avatar="other_avatar" />    

    <x-list-item :item="$item" sub-value="email" link="/show/{{$item->id}}" no-separator>
        <x-slot:action>
            <x-button icon="o-trash" class="text-red-500" />
        </x-slot:action>
    </x-list-item>
    @endverbatim
</x-code>


</x-layouts.app>
{{-- blade-formatter-enable --}}
