<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('/favicon.ico') }}" color="#ff2d20">

    {{--  Meta description  --}}
    <meta name="description" content="{{ $description ?? config('app.name') }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mary-ui.com/">
    <meta property="og:title" content="maryUI">
    <meta property="og:description" content="Gorgeous Livewire UI components styled with daisyUI + Tailwind.">
    <meta property="og:image" content="https://mary-ui.com/mary-banner.png">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mary-ui.com/">
    <meta property="twitter:title" content="maryUI">
    <meta property="twitter:description" content="Gorgeous Livewire UI components styled with daisyUI + Tailwind.">
    <meta property="twitter:image" content="https://mary-ui.com/mary-banner.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Algolia docsearch --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link rel="preconnect" href="https://0AWOCS02I6-dsn.algolia.net" crossorigin />

    <!-- Google tag (gtag.js) -->
    @if(config('app.env') == 'production')
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-NDC4ZLZ6D2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'G-NDC4ZLZ6D2');
        </script>
    @endif
</head>

<body class="min-h-screen font-sans antialiased">
    <div class="bg-warning/10 text-center p-2 text-sm">
        <x-icon name="o-sparkles" class="h-4 w-4" />
        maryUI 2 beta1 available!
        <a href="/docs/upgrading" class="underline font-black">Try it &rarr;</a>
    </div>
    <x-nav sticky>
        <x-slot:brand>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            <a href="/" wire:navigate>
                <x-mary-brand />
            </a>
        </x-slot:brand>
        <x-slot:actions class="flex !gap-1 lg:!gap-4">
            <span class="hidden lg:inline-flex gap-4">
                <x-button label="Sponsor" icon="o-heart" link="https://github.com/sponsors/robsontenorio" external class="btn-sm btn-ghost text-pink-500" />
                <x-button label="Bootcamp" icon="o-code-bracket" link="/bootcamp/01" class="btn-sm btn-ghost text-yellow-600" />
                <x-button label="Docs" icon="o-book-open" link="/docs/installation" class="btn-sm btn-ghost" />
                <x-button label="News" icon="fab.twitter" link="https://twitter.com/robsontenorio" class="btn-ghost btn-sm" external responsive />
            </span>

            <x-button label="Source" icon="fab.github" link="https://github.com/robsontenorio/mary" class="btn-ghost btn-sm " external responsive />

            <span class="hidden lg:inline-flex">
                <x-theme-toggle class="btn btn-sm btn-circle btn-ghost" />
            </span>

            <div id="doc-search" class="mr-2 lg:mr-8">...</div>
        </x-slot:actions>
    </x-nav>

    <x-main with-nav>
        <x-slot:sidebar drawer="main-drawer" class="bg-base-100">
            <x-menu icon="o-sparkles" activate-by-route class="mt-5">
                <x-menu-item title="Bootcamp" link="/bootcamp/01" icon="fas.dice-one" />
                <x-menu-separator />
                <x-menu-item title="Setup" link="/bootcamp/02" icon="fas.dice-two" />
                <x-menu-item title="Listing users" link="/bootcamp/03" icon="fas.dice-three" />
                <x-menu-item title="Updating users" link="/bootcamp/04" icon="fas.dice-four" />
                <x-menu-item title="Spotlight" link="/bootcamp/05" icon="fas.dice-five" />
                <x-menu-item title="Jetstream & Breeze" link="/bootcamp/06" icon="fas.dice-six" />
                <x-menu-separator />
                <x-menu-item title="A wrap" link="/bootcamp/07" icon="fas.dice" />

            </x-menu>
        </x-slot:sidebar>

        <x-slot:content class="lg:max-w-4xl">

            {{ $slot }}

            <hr class="my-10 border-base-300" />

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

    {{-- Spotlight --}}
    <x-spotlight />

    {{-- Star --}}
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
