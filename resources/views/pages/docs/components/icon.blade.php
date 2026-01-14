<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Icon')]
#[Layout('layouts.app', ['description' => 'Livewire UI icon component using Blade UI that supports dozen of iconsets.'])]
class extends Component {
}
?>
<div class="docs">

    <x-anchor title="Icon" />

    <x-anchor title="Default iconset" size="text-xl" class="mt-14" />
    <p>
        All the default icons are powered by <a href="https://blade-ui-kit.com/blade-icons?set=1#search" target="_blank">Blade Hero Icons</a> and you can use them right away.
    </p>

    <x-code-example class="flex gap-5">
        @verbatim('docs')
            <x-icon name="o-envelope" />

            <x-icon name="s-envelope" class="w-9 h-9 text-green-500" />

            <x-icon name="o-envelope" class="w-12 h-12 bg-orange-500 text-white p-2 rounded-full" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Labels" size="text-xl" class="mt-14" />

    <x-code-example class="flex gap-5">
        @verbatim('docs')
            <x-icon name="o-envelope" label="Messages" />

            <x-icon name="s-envelope" class="w-9 h-9 text-green-500 text-2xl" label="Messages" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Alternative iconset" size="text-xl" class="mt-14" />

    <p>
        You can install any compatible blade iconset <a href="https://github.com/blade-ui-kit/blade-icons#icon-packages" target="_blank">listed here</a>.
    </p>
    <p>
        Here is an example for Font Awesome and Lucide iconsets.
    </p>
    <x-code-example no-render language="shellscript">
        @verbatim('docs')
            # Font Awesome
            composer require owenvoke/blade-fontawesome

            # Lucide
            composer require mallardduck/blade-lucide-icons
        @endverbatim
    </x-code-example>

    <x-code-example class="flex gap-5">
        @verbatim('docs')
            {{-- Font Awesome variants --}}
            <x-icon name="fas.cloud" />
            <x-icon name="far.circle-play" />
            <x-icon name="fab.facebook" />

            {{-- Lucide --}}
            <x-icon name="lucide.activity" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Caching" size="text-xl" class="mt-14" />
    <p>
        As advised by <a href="https://github.com/blade-ui-kit/blade-icons#caching">Blade Icons docs</a> it is a good idea to put icons on cache at the
        <strong>production environment</strong>.
    </p>
    <x-code-example no-render language="shellscript">
        php artisan icons:cache
    </x-code-example>
</div>
