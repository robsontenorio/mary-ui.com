{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Form
</x-markdown>

<div class="p-10 rounded-md bg-gray-100">
    <x-form wire:submit="save">
        <x-input label="Name" hint="Full name" />
        <x-input label="E-mail" icon="o-envelope" />
        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Save" class="btn-primary" type="submit" />
        </x-slot:actions>
    </x-form>
</div>

<pre>
<x-torchlight-code language='html'>
    <X-form wire:submit="save">
        <X-input label="Name" hint="Full name" />
        <X-input label="E-mail" icon="o-envelope" />
        <X-slot:actions>
            <X-button label="Cancel" />
            <X-button label="Save" class="btn-primary" type="submit" />
        </X-slot:actions>
    </X-form>
</x-torchlight-code>
</pre>

</x-layouts.app>
{{-- blade-formatter-enable --}}
