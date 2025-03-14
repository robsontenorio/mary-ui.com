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
    <meta name="description" content="Gorgeous UI components for Livewire powered by daisyUI and Tailwind">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mary-ui.com/">
    <meta property="og:title" content="maryUI">
    <meta property="og:description" content="Gorgeous UI components for Livewire powered by daisyUI and Tailwind">
    <meta property="og:image" content="https://mary-ui.com/mary-banner.png?new=2024-03-03">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mary-ui.com/">
    <meta property="twitter:title" content="maryUI">
    <meta property="twitter:description" content="Gorgeous UI components for Livewire powered by daisyUI and Tailwind">
    <meta property="twitter:image" content="https://mary-ui.com/mary-banner.png?new=2024-03-03">

    {{--  Currency  --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>

    {{-- Cropper.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />

    {{-- Sortable.js --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.1/Sortable.min.js"></script>

    {{-- PhotoSwipe --}}
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">

    {{-- TinyMCE --}}
    <script src="/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

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
    <x-nav sticky>
        <x-slot:brand>
            <a href="/" wire:navigate>
                <x-mary-brand />
            </a>
        </x-slot:brand>
        <x-slot:actions class="flex !gap-1 lg:!gap-4">
            <span class="hidden lg:inline-flex gap-4">
                <x-button label="Bootcamp" link="/bootcamp/01" class="btn-ghost" />
                <x-button label="Docs" link="/docs/installation" class="btn-ghost" />
                <x-button label="News" link="https://twitter.com/robsontenorio" class="btn-ghost" />
                <x-button label="Source" link="https://github.com/robsontenorio/mary" class="btn-ghost" external />
                <x-button label="Sponsor" link="https://github.com/sponsors/robsontenorio" external class="btn-ghost text-pink-500" />
            </span>

            <x-button icon="fab.github" link="https://github.com/robsontenorio/mary" class="btn-sm btn-ghost btn-circle mr-4 lg:hidden" external />
            <div class="border-l border-l-base-content/20 hidden sm:block">&nbsp;</div>
            <x-theme-toggle class="btn btn-sm btn-circle btn-ghost" />
            <div id="doc-search" class="mr-2 lg:mr-8">...</div>
        </x-slot:actions>
    </x-nav>

    <x-main>
        <x-slot:content class="px-0 lg:px-0">
            {{ $slot }}
        </x-slot:content>
        <x-slot:footer>
            <hr class="border-base-content/10 my-10" />

            <div class="text-center text-sm text-base-content/70 pb-10">
                Made with
                <x-icon name="o-heart" class="text-pink-500 w-4 h-4" />
                by
                <a href="https://x.com/robsontenorio" class="underline">Robson Tenório</a> and <a href="https://github.com/robsontenorio/mary" class="underline">contributors</a>.
            </div>
        </x-slot:footer>
    </x-main>

    {{-- Algolia search docs --}}
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
</body>

</html>
