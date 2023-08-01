{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Header
</x-markdown>

<div class="p-10 rounded-md bg-gray-100">
    <x-header title="Users" subtitle="Manage all users here"  separator>
        <x-slot:actions>
            <x-button label="Add" icon="o-plus" class="btn-primary" />
        </x-slot:actions>
    </x-header>

    <x-header title="Personal address" subtitle="Make sure inform your current location" size="text-xl" />
</div>

<pre>
<x-torchlight-code language='html'>
   <X-header title="Users" subtitle="Manage all users here"  separator>
        <X-slot:actions>
            <X-button label="Add" icon="o-plus" class="btn-primary" />
        </X-slot:actions>
    </X-header>

    <X-header title="Personal address" subtitle="Make sure inform your current location" size="text-xl" />
</x-torchlight-code>
</pre>

</x-layouts.app>
{{-- blade-formatter-enable --}}
