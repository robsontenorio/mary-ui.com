{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Drawer

You can direct open a drawer by using native HTML `<label>` while referencing drawer `id`. It closes when you click outside.

</x-markdown>

<x-code class="flex gap-5">
     @verbatim
    <x-drawer id="my-drawer" class="bg-purple-300" >
        Content left auto width.
    </x-drawer>

    <x-drawer id="my-drawer2" class="w-1/3" right>
        <x-card title="Settings" subtitle="Main profile">
            Content right with fixed width and Card.
        </x-card>
    </x-drawer>

    {{-- Just reference correct drawer ID --}}
    <label for="my-drawer" class="btn btn-primary capitalize">Open left</label>
    <label for="my-drawer2" class="btn btn-warning capitalize">Open right</label>
@endverbatim
</x-code>

<x-markdown>
You can use Livewire or Alpine for a existing model property.
</x-markdown>

<pre>
<x-torchlight-code language='html'>
    @verbatim
    <!-- Livewire  -->
    <x-button label="Open" wire:model="drawerOpened" />
    
    <!-- Alpine  -->
    <x-button label="Open" x-on:click="$wire.drawerOpened = true" />
    @endverbatim
</x-torchlight-code>
</pre>


</x-layouts.app>
{{-- blade-formatter-enable --}}
