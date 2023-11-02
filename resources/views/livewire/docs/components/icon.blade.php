<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Icon')] #[Layout('components.layouts.app', ['description' => 'Livewire UI icon component using Blade UI that supports dozen of iconsets.'])] class extends Component
{
}
?>
<div class="docs">

    <x-anchor title="Icon" />

    <x-anchor title="Default iconset" size="text-2xl" class="mt-10 mb-5" />
    <p>
        All the default icons are powered by <a href="https://blade-ui-kit.com/blade-icons?set=1#search" target="_blank">Blade Hero Icons</a> and you can use them right away.
    </p>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-icon name="o-envelope" />

            <x-icon name="s-envelope" class="w-9 h-9 text-green-500" />

            <x-icon name="o-envelope" class="w-12 h-12 bg-orange-500 text-white p-2 rounded-full" />
        @endverbatim
    </x-code>

    <x-anchor title="Alternative iconset" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can install any compatible blade iconset <a href="https://github.com/blade-ui-kit/blade-icons#icon-packages" target="_blank">listed here</a>.
    </p>
    <p>
        Here is an example for FontAwsome and Bootstrap iconsets.
    </p>
    <x-code no-render language="bash">
        composer require owenvoke/blade-fontawesome
        composer require davidhsianturi/blade-bootstrap-icons
    </x-code>

    <x-code class="flex gap-5">
        @verbatim('docs')
            {{-- FontAwsome variants --}}
            <x-icon name="fas.cloud" />
            <x-icon name="far.circle-play" />
            <x-icon name="fab.facebook" />

            {{-- Bootstrap --}}
            <x-icon name="bi.bell-fill" />
        @endverbatim
    </x-code>

    <x-anchor title="Caching" size="text-2xl" class="mt-10 mb-5" />
    <p>
        As advised by <a href="https://github.com/blade-ui-kit/blade-icons#caching">Blade Icons docs</a> it is a good idea to put icons on cache at the
        <strong>production environment</strong>.
    </p>
    <x-code no-render language="bash">
        php artisan icons:cache
    </x-code>
</div>
