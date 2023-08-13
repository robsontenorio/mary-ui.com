<div>

<x-markdown>
# Modal
</x-markdown>


<x-code>
@verbatim
 <!-- Use same ID and call `.showModal()` -->
<x-button label="Open modal" class="btn-primary" onclick="modal17.showModal()" />

 <!-- Here is modal`s ID -->
<x-modal id="modal17" title="Are you sure?">
    Click "cancel" or press ESC to exit.

    <x-slot:actions>
         <!-- Use same ID and call `.close()` -->
        <x-button label="Cancel" onclick="modal17.close()" />
        <x-button label="Confirm" class="btn-primary" />
    </x-slot:actions>
</x-modal>
@endverbatim
</x-code>

<x-code>
@verbatim
 <!-- Use same ID and call `.showModal()` -->
<x-button label="With subtitle and separator" class="btn-primary" onclick="modal99.showModal()" />

 <!-- Here is modal`s ID -->
<x-modal id="modal99" title="Checkout" subtitle="Your full items" separator>
    Click "cancel" or press ESC to exit.

    <x-slot:actions>
         <!-- Use same ID and call `.close()` -->
        <x-button label="Cancel" onclick="modal99.close()" />
        <x-button label="Confirm" class="btn-primary" />
    </x-slot:actions>
</x-modal>
@endverbatim
</x-code>

<x-markdown>
### With Livewire

TODO //
</x-markdown>


</div>