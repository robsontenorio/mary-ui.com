{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Button
</x-markdown>

<div class="">
    <x-button label="Save" />
    <x-button label="Save" class="btn-warning" />
    <x-button label="Save" icon="o-check" class="btn-success" />
    <x-button icon="o-check" class="btn-info text-white">
        With default slot
    </x-button>
</div>

<pre>
<x-torchlight-code language='html'>
    <X-button label="Save" />

    <X-button label="Save" class="btn-warning" />

    <X-button label="Save" icon="o-check" class="btn-success" />

    <X-button icon="o-check" class="btn-info">
        With default slot
    </X-button>
</x-torchlight-code>
</pre>

</x-layouts.app>
{{-- blade-formatter-enable --}}
