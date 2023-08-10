{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Header
</x-markdown>

<x-code class="grid gap-5">
@verbatim
    <x-header title="Personal address" subtitle="Your home address" separator />

    <x-header title="Personal address" subtitle="Your home address" size="text-xl" separator />

    <x-header title="Users">
        <x-slot:middle>
            <x-input icon="o-magnifying-glass" placeholder="Search..." />
        </x-slot:middle>
        <x-slot:actions>        
            <x-button icon="o-funnel"  />
            <x-button icon="o-plus" class="btn-primary" />            
        </x-slot:actions>
    </x-header>

    
@endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
