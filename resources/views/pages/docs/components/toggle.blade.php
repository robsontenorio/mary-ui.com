{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Toggle
</x-markdown>

<x-code class="flex gap-5 justify-center">
    <div class="w-96 bg-base-200 p-5 rounded-lg">
        @verbatim
        <x-toggle label="Option 1" /> 

        {{-- Just place "checked" to toggle --}}
        <x-toggle label="Option 2" class="toggle-error" checked />

        {{-- Livewire model --}}
        <x-toggle label="Option 3" wire:model="active" />

        {{-- Right side --}}
        <x-toggle label="Option 4" right />
        @endverbatim
    </div>
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
