{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Toggle
</x-markdown>

<x-code class="flex gap-10">
    @verbatim
    <x-toggle label="Option" />

    {{-- Just place "checked" to toggle --}}
    <x-toggle label="Option" class="toggle-error" checked />

    {{-- Livewire model --}}
    <x-toggle label="Option" wire:model="active" />
    @endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
