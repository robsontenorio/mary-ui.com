<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Installation')] class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Installation" />

    <p>
        This package <strong>does not ship any custom CSS</strong> and relies on <strong>daisyUI and Tailwind</strong> for out-of-box styling.
        You can customize most of the components' styles, by inline overriding daisyUI and Tailwind CSS classes.
    </p>

    <x-alert icon="o-light-bulb">
        Please, for further styles reference see <a href="https://daisyui.com" target="_blank">daisyUI</a> and <a href="https://tailwindcss.com" target="_blank">Tailwind</a>.
    </x-alert>

    <x-anchor title="Automatic" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This package requires that you are installing Mary on a <strong>brand-new</strong> Laravel project, <strong>without any starter kit like Breeze or Jetstream</strong>.
        The installer also includes a starter layout, a <code>Welcome</code> component and its route.
    </p>

    <x-code no-render language="bash">
        composer require robsontenorio/mary

        php artisan mary:install
    </x-code>

    <p>
        Then, start the dev server.
    </p>

    <x-code no-render language="bash">
        yarn dev
    </x-code>

    <p>
        <x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />
        <strong>... You are done!</strong>
    </p>

    <x-alert icon="o-light-bulb">
        Go to the <a href="/docs/layout" wire:navigate>Layout</a> section to quickly get started.
    </x-alert>

    <x-anchor title="Manual" size="text-2xl" class="mt-10 mb-5" />

    <p>
        If you have an existing Laravel project <strong>with a starter kit like Breeze or Jetstream</strong>, follow these steps.
    </p>
    <p>
        Once Mary was primarily designed to work on fresh projects <strong>without starter kits</strong>,
        you will have to handle some conflicts by yourself, like <strong>component name collisions</strong> or existing settings.
    </p>
    <p>
        <strong>Not all steps</strong> may apply for some starter kits.
    </p>

    <x-code no-render language="bash">
        # Livewire 3
        composer require livewire/livewire

        # Mary
        composer require robsontenorio/mary

        # Tailwind and daisyUI
        yarn add -D tailwindcss daisyui@latest postcss autoprefixer && npx tailwindcss init -p
    </x-code>

    <p>
        Add <strong>Mary</strong> and <strong>Daisy</strong> entries to <code>tailwind.config.js</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="javascript">
        /** @type {import('tailwindcss').Config} */
        export default {
            content: [
                // You will probably also need those lines
                "./resources/**/**/*.blade.php",
                "./resources/**/**/*.js",
                "./app/View/Components/**/**/*.php",
                "./app/Livewire/**/**/*.php",

                // Add mary  [tl! highlight:1 .animate-bounce]
                "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
            ],
            theme: {
            extend: {},
            },

            // Add daisyUI
            plugins: [require("daisyui")]
        }
    </x-code>
    {{--@formatter:on--}}

    <p>
        Add Tailwind directives to <code>resources/css/app.css</code>.
    </p>

    <x-code no-render language="css">
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
    </x-code>

    <p>
        Setup Livewire default app template.
    </p>

    <x-code no-render language="bash">
        # This creates `views/components/layouts/app.blade.php`
        php artisan livewire:layout
    </x-code>

    <p>
        Then add the <code>&#x40;vite</code> directive on the default app template <code>views/components/layouts/app.blade.php</code>.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- This [tl! highlight:1 .animate-bounce] --}}
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>

            <body>...</body>
        @endverbatim
    </x-code>

    <p>
        Finally, start the dev server.
    </p>

    <x-code no-render language="bash">
        yarn dev
    </x-code>

    <p>
        <x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />
        <strong>... You are done!</strong>
    </p>

    <x-alert icon="o-light-bulb">
        Check the <a href="/docs/layout" wire:navigate>Layout</a> section to quickly get started.
    </x-alert>

</div>
