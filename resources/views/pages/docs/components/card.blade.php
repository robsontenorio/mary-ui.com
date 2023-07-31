{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Card
</x-markdown>

<div class="grid grid-flow-col grid-cols-2 gap-10 bg-gray-100 p-10 rounded-md">
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
</div>

<pre>
<x-torchlight-code language='html'>
    <X-card title="You stats" subtitle="Our finds about you" shadow separator>
        I have title, subtitle, separator and shadow.
    </X-card>

    <X-card title="Nice things">
        I am using slots here.
        <X-slot:figure> 
            <img src="https://picsum.photos/500/200"  />
        </X-slot:figure>
        <X-slot:menu>
            <X-icon name="o-heart" />
        </X-slot:menu>
        <X-slot:actions>
            <X-button label="Ok" class="btn-primary" />
        </X-slot:actions>
    </X-card>
</x-torchlight-code>
</pre>

</x-layouts.app>
{{-- blade-formatter-enable --}}
