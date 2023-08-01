{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Form
</x-markdown>

<x-code class="">
@verbatim
    <x-form wire:submit="save">
        <x-input label="Name" hint="Full name" />
        <x-input label="E-mail" icon="o-envelope" />
        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Save" class="btn-primary" type="submit" />
        </x-slot:actions>
    </x-form>
@endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
