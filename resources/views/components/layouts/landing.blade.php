<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('/favicon.ico') }}" color="#ff2d20">

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

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Algolia docsearch --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link rel="preconnect" href="https://0AWOCS02I6-dsn.algolia.net" crossorigin />
</head>

<body class="min-h-screen font-sans antialiased">
<x-nav sticky>
    <x-slot:brand>
        <a href="/" wire:navigate>
            <x-mary-brand />
        </a>
    </x-slot:brand>
    <x-slot:actions>
        <div id="doc-search">...</div>

        <div class="hidden lg:block">
            <a href="/docs/installation" wire:navigate class="font-medium btn btn-ghost btn-sm">
                <x-icon name="o-book-open" />
                Docs
            </a>

            <a class="btn btn-ghost btn-sm" href="https://github.com/sponsors/robsontenorio">
                <x-icon name="o-heart" class="text-pink-500" />
                Sponsor
            </a>
        </div>

        <a href="https://twitter.com/robsontenorio">
            <x-icon name="fab.twitter" />
        </a>

        <a href="https://github.com/robsontenorio/mary">
            <x-icon name="fab.github" />
        </a>
    </x-slot:actions>
</x-nav>

<x-main>
    <x-slot:content class="px-0 lg:px-0">
        {{ $slot }}
    </x-slot:content>
    <x-slot:footer>
        <hr />
        <div class="justify-center items-baseline flex my-10">
            <x-mary-brand />
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
