{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Icon

All icons are powered by [Blade Hero Icons](https://blade-ui-kit.com/blade-icons?set=1#search).

</x-markdown>

<x-code class="rounded-md bg-gray-100 p-10">
@verbatim
    <x-icon name="o-envelope">
        <slot:actions>
            abc
        </slot:actions>
    </x-icon>

    <x-icon name="s-home" class="w-7 h-7 text-green-500" />
    <x-icon name="o-home" class="w-10 h-10 bg-orange-500 p-2 text-white rounded-full" />
@endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
