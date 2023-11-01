<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('/favicon.ico') }}" color="#ff2d20">

    {{--  Meta description  --}}
    <meta name="description" content="{{ $description ?? config('app.name') }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mary-ui.com/">
    <meta property="og:title" content="Mary UI">
    <meta property="og:description" content="Laravel blade components for Livewire 3.">
    <meta property="og:image" content="https://mary-ui.com/mary-banner.png">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mary-ui.com/">
    <meta property="twitter:title" content="Mary UI">
    <meta property="twitter:description" content="Laravel blade components for Livewire 3.">
    <meta property="twitter:image" content="https://mary-ui.com/mary-banner.png">

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

    {{-- Vanilla Calendar --}}
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/vanilla-calendar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/themes/light.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/themes/dark.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/vanilla-calendar.min.js" defer></script>

    {{-- DIFF2HTML --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/styles/github.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html/bundles/css/diff2html.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html/bundles/js/diff2html-ui.min.js"></script>

    {{-- Chart.js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    {{--  Currency  --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Algolia docsearch --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link rel="preconnect" href="https://0AWOCS02I6-dsn.algolia.net" crossorigin />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NDC4ZLZ6D2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-NDC4ZLZ6D2');
    </script>
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
        <div id="doc-search" class="mr-2 lg:mr-8">...</div>

        <x-button label="Sponsor" icon="s-heart" link="https://github.com/sponsors/robsontenorio" class="btn-ghost btn-sm text-red-500 hidden lg:inline-flex" external />
        <x-button icon="fab.twitter" link="https://twitter.com/robsontenorio" class="btn-ghost btn-sm" external />
        <x-button icon="fab.github" link="https://github.com/robsontenorio/mary" class="btn-ghost btn-sm" external />
    </x-slot:actions>
</x-nav>

<x-main with-nav>
    <x-slot:sidebar drawer="main-drawer">
        <x-menu title="Get started" icon="o-sparkles" separator activate-by-route class="mt-5">
            <x-menu-item title="Installation" link="/docs/installation" />
            <x-menu-item title="Layout" link="/docs/layout" />
            <x-menu-item title="Customizing" link="/docs/customizing" />
            <x-menu-item title="Upgrading" link="/docs/upgrading" />
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
            <x-menu-item title="Textarea" link="/docs/components/textarea" />
            <x-menu-item title="File Upload" link="/docs/components/file" />

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
            <x-menu-item title="Statistic" link="/docs/components/statistic" />
            <x-menu-item title="Timeline" link="/docs/components/timeline" />
            <x-menu-item title="Tabs" link="/docs/components/tabs" />

            <x-menu-separator title="Third-party" icon="o-puzzle-piece" />
            <x-menu-item title="Calendar" link="/docs/components/calendar" />
            <x-menu-item title="Chart" link="/docs/components/chart" />
            <x-menu-item title="Date Picker" link="/docs/components/datepicker" />
            <x-menu-item title="Diff" link="/docs/components/diff" />

        </x-menu>
    </x-slot:sidebar>

    <x-slot:content class="lg:max-w-4xl">

        {{ $slot }}

        <hr class="my-10" />

        <div class="flex justify-center items-center">
            <x-mary-brand />
            <x-button label="Sponsor" icon="s-heart" link="https://github.com/sponsors/robsontenorio" class="btn-ghost btn-sm text-red-500" external />
        </div>
    </x-slot:content>
</x-main>

{{-- Algolia search docs --}}
<script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3/dist/umd/index.js"></script>
<script type="text/javascript">
    docsearch({
        appId: '0AWOCS02I6',
        apiKey: '7814a814bf52a38ef15b03d5bf6be0f5',
        indexName: 'mary-ui',
        insights: true,
        container: '#doc-search',
        debug: false
    });
</script>

{{-- Toast --}}
<x-toast />

</body>
</html>
