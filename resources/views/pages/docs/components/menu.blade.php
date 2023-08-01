{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Menu
</x-markdown>

<x-code>
    @verbatim
    <x-menu title="Components" separator>
        <x-menu-item title="With link" icon="o-exclamation-triangle" link="/docs/components/alert" />
        <x-menu-item title="Messages" icon="o-envelope"  />
        <x-menu-item title="Trashes" icon="o-trash" active  />
        <x-menu-item title="No icon"  />
    </x-menu>
    @endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
