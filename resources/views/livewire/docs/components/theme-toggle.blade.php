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
        It is not expected to have more than one <strong>x-theme-toggle</strong> on the same page.
        Make sure to <strong>refresh the page</strong> while toying around with the theme toggle.
    </x-alert>

    <x-anchor title="Setup" size="text-xl" class="mt-14" />

    <p>
        Make sure your <code>app.css</code> has this settings.
    </p>

    {{--@formatter:off--}}
    <x-code-example language="sass" no-render>
        @verbatim('docs')
            /* Tailwind */
            @import "tailwindcss";

            /* daisyUI */
            @plugin "daisyui" {
                themes: light --default, dark --prefersdark;
            }

            /* Dark theme variant support */
            @custom-variant dark (&:where(.dark, .dark *));
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    <x-code-example class="flex gap-5 items-center">
        @verbatim('docs')
            <x-theme-toggle />
            <x-theme-toggle class="btn btn-circle" />
            <x-theme-toggle class="btn btn-circle btn-ghost" />
            <x-theme-toggle class="btn" @theme-changed="console.log($event.detail)" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Manual activation" size="text-xl" class="mt-14" />

    <p>
        You can toggle theme from anywhere by dispatching a <code>mary-toggle-theme</code> event.
    </p>

    <x-code-example class="flex">
        @verbatim('docs')
            <x-button label="Theme" icon="o-swatch" @click="$dispatch('mary-toggle-theme')" />
        @endverbatim
    </x-code-example>

    <p>
        In this case place a hidden instance of <code>x-theme-toggle</code> on same layout file.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render>
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
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Custom theme toggle" size="text-xl" class="mt-14" />

    <x-alert icon="o-light-bulb">
        It is not expected to have more than one <strong>x-theme-toggle</strong> on the same page. Make sure to <strong>refresh the page</strong> while toying around with
        the theme
        toggle.
    </x-alert>

    <p>
        By default, this component uses the standard "light" and "dark" themes shipped with <strong>daisyUI</strong>.
        But, you can customize them by passing the theme names.
    </p>

    <p>
        First, you need to set this additional themes at <code>app.css</code> as described on <a href="https://daisyui.com/docs/themes" target="_blank">daisyUI docs</a>.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="sass">
        @verbatim('docs')
            @plugin "daisyui" {
                themes: light --default, dark --prefersdark, retro, aqua;
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        Then, set the theme names on <code>x-theme-toggle</code> component.
    </p>

    <x-code-example>
        @verbatim('docs')
            <x-theme-toggle darkTheme="aqua" lightTheme="retro" />
        @endverbatim
    </x-code-example>
</div>
