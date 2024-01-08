<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Theme Toggle')]
#[Layout('components.layouts.app', ['description' => 'Livewire ui component for theme toggling between light and dark.'])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Theme Toggle" />

    <p>
        This component toggles between light/dark themes and includes an automatic persistent state.
    </p>

    <x-anchor title="Example" size="text-2xl" class="mt-10 mb-5" />

    <p>
        It is not expected to have more one of these on page. Make sure to refresh this page if you click more than one bellow.
    </p>

    <x-code class="flex gap-5 items-center">
        @verbatim('docs')
            <x-theme-toggle />
            <x-theme-toggle class="btn btn-circle" />
            <x-theme-toggle class="btn btn-circle btn-ghost" />
            <x-theme-toggle class="btn" @theme-changed="console.log($event.detail)" />
        @endverbatim
    </x-code>

    <x-anchor title="Manual activation" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can toggle theme from anywhere by dispatching a <code>mary-theme-toggle</code> event.
    </p>

    <x-code class="flex">
        @verbatim('docs')
            <x-menu>
                <x-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
            </x-menu>
        @endverbatim
    </x-code>

    <p>
        In this case place a hidden instance of <code>x-theme-toggle</code> on same layout file.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                {{-- Main content --}}
                <main>
                    {{ $slot }}
                </main>

                {{-- Side menu --}}
                <x-menu>
                    <x-menu-item title="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
                </x-menu>

                {{-- Theme toggle --}}
                <x-theme-toggle class="hidden" />
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

</div>
