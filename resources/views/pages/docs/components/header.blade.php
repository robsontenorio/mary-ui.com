{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Header
</x-markdown>

<x-code >
@verbatim
    <x-header title="Users" subtitle="Manage all users here"  separator>
        <x-slot:actions>
            <x-button label="Add" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-header title="Personal address" subtitle="Make sure inform your current location" size="text-xl" />
@endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
