<div>
<x-markdown>
# Menu
</x-markdown>

<x-code>
@verbatim
<x-menu title="Components" icon="o-cursor-arrow-rays" activate-by-route separator active-bg-color="bg-red-50">
    <x-menu-item title="Messages" icon="o-envelope"   />
    <x-menu-item title="Navigate to Alert docs" icon="o-arrow-right" link="/docs/components/alert" />
    
    <x-menu-separator />
    <x-menu-item title="Another item"  />
    
    <x-menu-separator title="Magic" icon="o-sparkles"  />
    <x-menu-item title="Hello"  />

    <!-- When route matches `link` property it activates menu -->
    <x-menu-item title="Active state" link="/docs/components/menu" />
            
    <x-menu-separator title="Tricks"  />
    <x-menu-item title="Hi"  />
    <x-menu-item title="Some style" class="text-purple-500 font-bold" />
</x-menu>
@endverbatim
</x-code>

</div>