{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Input
</x-markdown>

<x-code class="grid gap-3 " x-data>
    @verbatim
    <x-input label="Name" placeholder="Your name" hint="Fill with your full name" />

    <x-input label="E-mail" icon="o-envelope" />

    <x-input label="Auto money" prefix="R$" money />

    {{-- You can use native Alpine x-mask --}}
    <x-input label="Custom money" prefix="EU" x-mask:dynamic="$money($input, '.', ',')" />
    @endverbatim
</x-code>

<x-markdown>
### Validation errors

When you fill `name` attribute as same an `wire:model`, automatically validation error will be displayed.
</x-markdown>

<x-code>
    @verbatim
        <x-input label="E-mail" name="email" wire:model="email"  />
    @endverbatim
</x-code>


</x-layouts.app>
{{-- blade-formatter-enable --}}
