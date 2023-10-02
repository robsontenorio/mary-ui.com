<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('/favicon.ico') }}" color="#ff2d20">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mary-ui.com/">
    <meta property="og:title" content="Mary UI">
    <meta property="og:description" content="Laravel blade components for Livewire 3.">
    <meta property="og:image" content="https://mary-ui.com/mary-banner.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mary-ui.com/">
    <meta property="twitter:title" content="Mary UI">
    <meta property="twitter:description" content="Laravel blade components for Livewire 3.">
    <meta property="twitter:image" content="https://mary-ui.com/mary-banner.png">

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

    <!-- Vanilla Calendar -->
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/vanilla-calendar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/themes/light.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/themes/dark.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/vanilla-calendar.min.js" defer></script>

    <!-- DIFF2HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/styles/github.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html/bundles/css/diff2html.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html/bundles/js/diff2html-ui.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Algolia docsearch -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link rel="preconnect" href="https://0AWOCS02I6-dsn.algolia.net" crossorigin />
</head>

<body class="min-h-screen font-sans antialiased">
<x-nav sticky>
    <x-slot:brand>
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>

        <a href="/" wire:navigate>
            <x-mary-brand />
        </a>
    </x-slot:brand>
    <x-slot:actions>
        <div id="doc-search">...</div>

        <a class="btn btn-ghost btn-sm hidden lg:inline-flex" href="https://github.com/sponsors/robsontenorio">
            <x-icon name="o-heart" class="text-pink-500" />
            Sponsor
        </a>

        <a href="https://github.com/robsontenorio/mary">
            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                      d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                      clip-rule="evenodd"></path>
            </svg>
        </a>
    </x-slot:actions>
</x-nav>

<x-main with-nav>
    <x-slot:sidebar drawer="main-drawer">
        <x-menu title="Get started" icon="o-sparkles" separator activate-by-route class="mt-5">
            <x-menu-item title="Installation" link="/docs/installation" />
            <x-menu-item title="Layout" link="/docs/layout" />
            <x-menu-item title="Contributing" link="/docs/contributing" />

            <x-menu-separator title="Forms" icon="o-code-bracket-square" />
            <x-menu-item title="Form" link="/docs/components/form" />
            <x-menu-item title="Input" link="/docs/components/input" />
            <x-menu-item title="Checkbox" link="/docs/components/checkbox" />
            <x-menu-item title="Toggle" link="/docs/components/toggle" />
            <x-menu-item title="Radio" link="/docs/components/radio" />
            <x-menu-item title="Select" link="/docs/components/select" />
            <x-menu-item title="Choices" link="/docs/components/choices" />
            <x-menu-item title="Date Time" link="/docs/components/datetime" />
            <x-menu-item title="Textrarea" link="/docs/components/textarea" />

            <x-menu-separator title="List data" icon="o-list-bullet" />
            <x-menu-item title="List Item" link="/docs/components/list-item" />
            <x-menu-item title="Table" link="/docs/components/table" />

            <x-menu-separator title="Menus" icon="o-queue-list" />
            <x-menu-item title="Menu" link="/docs/components/menu" />
            <x-menu-item title="Dropdown" link="/docs/components/dropdown" />

            <x-menu-separator title="Dialogs" icon="o-window" />
            <x-menu-item title="Drawer" link="/docs/components/drawer" />
            <x-menu-item title="Modal" link="/docs/components/modal" />
            <x-menu-item title="Toast" link="/docs/components/toast" />

            <x-menu-separator title="UI" icon="o-cursor-arrow-rays" />
            <x-menu-item title="Alert" link="/docs/components/alert" />
            <x-menu-item title="Button" link="/docs/components/button" />
            <x-menu-item title="Badges" link="/docs/components/badges" />
            <x-menu-item title="Card" link="/docs/components/card" />
            <x-menu-item title="Header" link="/docs/components/header" />
            <x-menu-item title="Icon" link="/docs/components/icon" />
            <x-menu-item title="Stat" link="/docs/components/stat" />
            <x-menu-item title="Timeline" link="/docs/components/timeline" />
            <x-menu-item title="Tabs" link="/docs/components/tabs" />

            <x-menu-separator title="Third-party" icon="o-puzzle-piece" />
            <x-menu-item title="Calendar" link="/docs/components/calendar" />
            <x-menu-item title="Date Picker" link="/docs/components/datepicker" />
            <x-menu-item title="Diff" link="/docs/components/diff" />

        </x-menu>
    </x-slot:sidebar>

    <x-slot:content class="lg:max-w-4xl">

        {{ $slot }}

        <hr class="my-10" />

        <div class="justify-center items-baseline flex ">
            <x-mary-brand />

            <a class="btn btn-ghost btn-sm" href="https://github.com/sponsors/robsontenorio">
                <x-icon name="o-heart" class="text-pink-500 animate-pulse " />
                Sponsor
            </a>
        </div>
    </x-slot:content>
</x-main>

<!-- Algolia search docs -->
<script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3/dist/umd/index.js"></script>
<script type="text/javascript">
    docsearch({
        appId: '0AWOCS02I6',
        apiKey: '7814a814bf52a38ef15b03d5bf6be0f5',
        indexName: 'mary-ui',
        insights: true, // Optional, automatically send insights when user interacts with search results
        container: '#doc-search',
        debug: false // Set debug to true if you want to inspect the modal
    });
</script>

<!-- Toast -->
<x-toast />
</body>

</html>
