{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Card
</x-markdown>


<x-code class="grid grid-flow-col grid-cols-2 gap-10">
@verbatim
    <x-card title="You stats" subtitle="Our finds about you" shadow separator>
        I have title, subtitle, separator and shadow.
    </x-card>

    <x-card title="Nice things">
        I am using slots here.
        <x-slot:figure>
            <img src="https://picsum.photos/500/200"  />
        </x-slot:figure>
        <x-slot:menu>
            <x-icon name="o-heart" />
        </x-slot:menu>
        <x-slot:actions>
            <x-button label="Ok" class="btn-primary" />
        </x-slot:actions>            
    </x-card>
@endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
