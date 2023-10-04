<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Installation')] class extends Component
{
}
?>
<div>
<x-markdown class="markdown">
# Installation

This package <strong>does not ship any custom CSS</strong> and relies on <strong>daisyUI and Tailwind</strong> for out-of-box styling.
You can customize most of components styles, by inline overriding daisyUI and Tailwind CSS classes.
</x-markdown>

<x-alert icon="o-light-bulb" class="markdown">
    Please, for further style reference see <a href="https://daisyui.com" target="_blank">daisyUI</a> and <a href="https://tailwindcss.com" target="_blank">Tailwind</a>.
</x-alert>

<x-markdown>
### Automatic

It requires you are installing Mary on a **brand new** Laravel project, **without any starter kit**.
The installer also includes a starter layout, a `Welcome` component and its route.

<x-code no-render language="bash">
composer require robsontenorio/mary

php artisan mary:install
</x-code>

Then, start dev server.
<x-code no-render language="bash">
yarn dev
</x-code>

<x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />

<strong >... You are done!</strong>

<br>

### Manual

If you have created a Laravel project **with a starter kit**, follow these steps.

Once Mary was primarily designed to work on fresh projects **without starter kits**, probably you will have to handle some settings conflicts by yourself.

<x-code no-render language="bash">
# Livewire 3
composer require livewire/livewire

# Mary
composer require robsontenorio/mary

# Tailwind and daisyUI
yarn add -D tailwindcss daisyui@latest postcss autoprefixer && npx tailwindcss init -p
</x-code>

Add **Mary** and **Daisy** entries to `tailwind.config.js`.

<x-code no-render language="javascript">
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // You will probably also need those lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
    ],
    theme: {
        extend: {},
    },

    // Add daisyUI
    plugins: [require("daisyui")]
}
</x-code>

Add Tailwind directives to `resources/css/app.css`

<x-code no-render language="css">
@tailwind base;
@tailwind components;
@tailwind utilities;
</x-code>

Setup Livewire default app template.

<x-code no-render language="bash">
# This creates `views/components/layouts/app.blade.php`
php artisan livewire:layout
</x-code>

Then add @verbatim `@vite` @endverbatim on default app template `views/components/layouts/app.blade.php`

<x-code no-render>
@verbatim
<head>
    ...

    <!-- This -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>...</body>
@endverbatim
</x-code>

Finally, start dev server.
<x-code no-render language="bash">
yarn dev
</x-code>

<x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />

<strong >... You are done!</strong>

</x-markdown>

<x-alert icon="o-light-bulb" class="markdown">
    See <a href="/docs/layout" wire:navigate>Layout</a> section to quickly get started.
</x-alert>

</div>
