{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Button
</x-markdown>

<x-code class="flex gap-5">
@verbatim
    <x-button label="Save" class="btn-outline" />
    <x-button label="Save" class="btn-warning" />
    <x-button label="Save" icon="o-check" class="btn-success" />
    <x-button icon="o-check" class="btn-info text-white">
        With default slot
    </x-button>
@endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
