{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Menu
</x-markdown>

<x-code>
    @verbatim
    <x-menu title="Components" icon="o-cursor-arrow-rays" separator>
        <x-menu-item title="With navigation link" icon="o-share" link="/docs/components/alert" />
        <x-menu-item title="Messages" icon="o-envelope"   />
        
        <x-menu-separator />
        <x-menu-item title="Another item"  />
        
        <x-menu-separator title="Magic" icon="o-sparkles"  />
        <x-menu-item title="Hello"  />
        <x-menu-item title="Active state" active />
                
        <x-menu-separator title="Tricks"  />
        <x-menu-item title="Hi"  />
        <x-menu-item title="Some style" class="text-purple-500 font-bold" />
    </x-menu>
    @endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
