<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
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

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Algolia docsearch -->
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

        <a href="https://github.com/robsontenorio/mary">
            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                      d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                      clip-rule="evenodd"></path>
            </svg>
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
</body>

</html>
