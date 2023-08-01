{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Menu
</x-markdown>

<x-code>
    @verbatim
    <x-menu title="Components" icon="o-cursor-arrow-rays" separator>
        <x-menu-item title="With navigation link" icon="o-exclamation-triangle" link="/docs/components/alert" />
        <x-menu-item title="Messages" icon="o-envelope"  />
        <x-menu-item title="Trashes" icon="o-trash"  />
        
        <x-menu-separator />
        <x-menu-item title="Another item"  />
        
        <x-menu-separator title="Magic" icon="o-sparkles"  />
        <x-menu-item title="First"  />
        <x-menu-item title="Second"  />
        
        <x-menu-separator title="Tricks"  />
        <x-menu-item title="Cool"  />
        <x-menu-item title="Nice"  />
    </x-menu>
    @endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
