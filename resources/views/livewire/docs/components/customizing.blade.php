<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Customizing')] class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Customizing" />

    <p>
        <strong>Any configuration or CSS</strong> provided by <strong>daisyUI or Tailwind</strong> are valid for maryUI components.
        Here are some useful links:
    </p>
    <ul>
        <li>
            <x-button label="Customize" link="https://daisyui.com/docs/customize" class="btn-ghost !no-underline" icon="o-link" external />
        </li>
        <li>
            <x-button label="Config" link="https://daisyui.com/docs/config" class="btn-ghost !no-underline" icon="o-link" external />
        </li>
        <li>
            <x-button label="Colors" link="https://daisyui.com/docs/colors" class="btn-ghost !no-underline" icon="o-link" external />
        </li>
        <li>
            <x-button label="Utilities and variables" link="https://daisyui.com/docs/utilities" class="btn-ghost !no-underline" icon="o-link" external badge="new"
                      badge-classes="badge-warning badge-xs !no-underline" />
        </li>
        <li>
            <x-button label="Themes" link="https://daisyui.com/docs/themes" class="btn-ghost !no-underline" icon="o-link" external />
        </li>
        <li>
            <x-button label="Theme generator" link="https://daisyui.com/theme-generator" class="btn-ghost !no-underline" icon="o-link" external badge="new"
                      badge-classes="badge-warning badge-xs !no-underline" />
    </ul>

    <x-alert icon="o-light-bulb" class="my-10">
        <b>Pro tip:</b> avoid to tweak things and stick to defaults. DaisyUI themes are carefully hand crafted with all UX/UI things in mind.
    </x-alert>

    <x-anchor title="Theme variables" size="text-xl" class="mt-14 !mb-5" />

    <p>
        This is the advised approach for applying a global style across the components, through the daisyUI theming system.
    </p>

    <div data-theme="mytheme">
        <x-code class="grid gap-5">
            @verbatim('docs')
                <x-input />
                <x-select />
            @endverbatim
        </x-code>
        {{--@formatter:off--}}
        <x-code no-render language="less">
            @verbatim('docs')
            @plugin "daisyui/theme" {
                name: "light";              /* the theme name you wanna override */
                default: true;              /* set as default */
                prefersdark: false;         /* set as default dark mode (prefers-color-scheme:dark) */
                color-scheme: light;        /* color of browser-provided UI */

                /* Custom styles ...*/
                --radius-field: 2.25rem;
            }
            @endverbatim
        </x-code>
        {{--@formatter:on--}}
    </div>

    <x-anchor title="Through `app.css`" size="text-xl" class="mt-14 !mb-5" />

    <p>
        Use this as secondary approach, when theme variables is not enough.
    </p>

    <div data-theme="mytheme2">
        <x-code class="grid gap-5">
            @verbatim('docs')
                <x-input label="Name" hint="Hey" />
                <x-select />
            @endverbatim
        </x-code>
        {{--@formatter:off--}}
        <x-code no-render language="less">
            @verbatim('docs')
            .input {
                @apply outline-none;
            }

            .select {
                @apply outline-none  rounded-3xl;
            }

            .fieldset-legend {
                @apply text-[1.09rem] font-bold;
            }

            .fieldset-label {
                @apply italic;
            }
            @endverbatim
        </x-code>
        {{--@formatter:on--}}
    </div>

    <x-anchor title="Component classes" size="text-xl" class="mt-14 !mb-5" />

    <p>
        You can apply any CSS class to individual components for edge cases.
    </p>

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-input placeholder="Default" />
            <x-input placeholder="No outline" class="!outline-none" />
            <x-input placeholder="Primary" class="input-primary text-primary" />
            <x-select placeholder="Size" class="select-xl" />
        @endverbatim
    </x-code>

    <div class="pb-96"></div>

</div>
