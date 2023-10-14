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

    {{--  Currency  --}}
    @maryJS('currency/currency.js')

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
        <div id="doc-search" class="mr-2 lg:mr-8">...</div>

        <div class="hidden lg:block">
            <x-button label="Docs" icon="o-book-open" link="/docs/installation" class="btn-sm btn-ghost" />
            <x-button label="Sponsor" icon="s-heart" link="https://github.com/sponsors/robsontenorio" class="btn-ghost btn-sm text-red-500 hidden lg:inline-flex" external />
        </div>

        <x-button icon="s-heart" link="https://github.com/sponsors/robsontenorio" class="btn-ghost btn-sm text-red-500 lg:hidden" external />
        <x-button icon="fab.twitter" link="https://twitter.com/robsontenorio" class="btn-ghost btn-sm" external />
        <x-button icon="fab.github" link="https://github.com/robsontenorio/mary" class="btn-ghost btn-sm" external />
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
