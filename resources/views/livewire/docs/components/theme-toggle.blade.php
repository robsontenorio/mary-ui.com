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

    <x-alert icon="o-light-bulb">
        It is not expected to have more than one <strong>x-theme-toggle</strong> on the same page. Make sure to <strong>refresh the page</strong> while toying around with the theme
        toggle.
    </x-alert>

    <x-anchor title="Setup" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        Enable native Tailwind dark mode support on <code>tailwind.config.js</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="javascript">
        export default {
            ...
            darkMode: 'class', // [tl! highlight]
        }
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Example" size="text-2xl" class="mt-10 !mb-5" />

    <x-code class="flex gap-5 items-center">
        @verbatim('docs')
            <x-theme-toggle />
            <x-theme-toggle class="btn btn-circle" />
            <x-theme-toggle class="btn btn-circle btn-ghost" />
            <x-theme-toggle class="btn" @theme-changed="console.log($event.detail)" />
        @endverbatim
    </x-code>

    <x-anchor title="Manual activation" size="text-2xl" class="mt-10 !mb-5" />

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

    <x-anchor title="Custom theme toggle" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        By default, this component uses the standard "light" and "dark" themes shipped with <strong>daisyUI</strong>. But, you can customize them by passing the theme names.
    </p>

    <p>
        First, you need to set this additional themes at <code>tailwind.config.js</code> as described on <a href="https://daisyui.com/docs/themes" target="_blank">daisyUI docs</a>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="javascript">
        @verbatim('docs')
            daisyui: {
                themes: ["light", "dark", "aqua", "cupcake"],
            },
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-code>
        @verbatim('docs')
            <x-theme-toggle darkTheme="aqua" lightTheme="retro" />
        @endverbatim
    </x-code>

    <x-alert icon="o-light-bulb">
        It is not expected to have more than one <strong>x-theme-toggle</strong> on the same page. Make sure to <strong>refresh the page</strong> while toying around with the theme
        toggle. Then, click on the theme toggle from the main navbar of this docs to back to default "light" and "dark" themes.
    </x-alert>

</div>
