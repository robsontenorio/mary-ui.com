{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Drawer

You can direct open drawer by using native HTML `<label>` by referencing drawer `id`.    

</x-markdown>

<div class="">
   <x-drawer id="my-drawer">
        Content left
   </x-drawer>

   <x-drawer id="my-drawer2" right>
        Content right
   </x-drawer>

    <label for="my-drawer" class="btn btn-primary capitalize">Open left</label>

    <label for="my-drawer2" class="btn btn-warning capitalize">Open right</label>
</div>

<pre>
<x-torchlight-code language='html'>
    <X-drawer id="my-drawer">
        Content left
    </X-drawer>

    <X-drawer id="my-drawer2" right>
            Content right
    </X-drawer>

    <!-- Make sure to reference correct drawer id -->
    <label for="my-drawer" class="btn btn-primary capitalize">Open left</label>

    <!-- Make sure to reference correct drawer id -->
    <label for="my-drawer2" class="btn btn-warning capitalize">Open right</label>
</x-torchlight-code>
</pre>

<x-markdown>
You can use Livewire or Alpine for a existing model property.
</x-markdown>

<pre>
<x-torchlight-code language='html'>
    <!-- Livewire  -->
    <X-button label="Open" wire:model="drawerOpened" />
    
    <!-- Alpine  -->
    <X-button label="Open" x-on:click="$wire.drawerOpened = true" />
</x-torchlight-code>
</pre>


</x-layouts.app>
{{-- blade-formatter-enable --}}
