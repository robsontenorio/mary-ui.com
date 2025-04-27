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
    <meta property="og:description" content="Gorgeous UI components for Livewire powered by daisyUI and Tailwind.">
    <meta property="og:image" content="https://mary-ui.com/mary-banner.png?new=2025-03-14">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mary-ui.com/">
    <meta property="twitter:title" content="maryUI">
    <meta property="twitter:description" content="Gorgeous UI components for Livewire powered by daisyUI and Tailwind.">
    <meta property="twitter:image" content="https://mary-ui.com/mary-banner.png?new=2025-03-14">

    {{-- Flatpickr --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://unpkg.com/flatpickr/dist/plugins/monthSelect/index.js"></script>
    <link href="https://unpkg.com/flatpickr/dist/plugins/monthSelect/style.css" rel="stylesheet">
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

    {{-- Vanilla Calendar --}}
    <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.css" rel="stylesheet">

    {{-- DIFF2HTML --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/xcode.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/css/diff2html.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/js/diff2html-ui.min.js"></script>

    {{-- Chart.js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

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

    {{-- Markdown --}}
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

    {{--  Currency  --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>

    {{-- Signature Pad  --}}
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.2.0/dist/signature_pad.umd.min.js"></script>

    {{-- Ace Editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ext-language_tools.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Algolia docsearch --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link rel="preconnect" href="https://0AWOCS02I6-dsn.algolia.net" crossorigin />

    {{-- Umami Analytics --}}
    <script defer src="https://analytics.robsontenorio.com/script.js" data-website-id="9dac1324-beb1-49e3-8a3f-8528fdc91df3"></script>

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
    {{--    <div class="bg-success/10 text-center p-2 text-sm">--}}
    {{--        <x-icon name="o-fire" class="h-4 w-4" />--}}
    {{--        maryUI v2 released!--}}
    {{--        <a href="/docs/upgrading" class="underline font-black border-l border-l-base-content/30 pl-2 ml-2">Upgrade guide</a>--}}
    {{--        <a href="https://v1.mary-ui.com" class="hidden sm:inline-block underline font-black border-l border-l-base-content/30 pl-2 ml-2">Back to v1</a>--}}
    {{--    </div>--}}
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
                <x-button label="Bootcamp" link="/bootcamp/01" class="btn-ghost" />
                <x-button label="Docs" link="/docs/installation" class="btn-ghost" />
                <x-button label="Sponsor" link="https://github.com/sponsors/robsontenorio" external class="btn-ghost text-pink-500" />
            </span>

            <div class="border-l border-l-base-content/20 hidden sm:block">&nbsp;</div>
            <x-button icon="fab.discord" link="https://discord.gg/c2Dv8T2X2s" class="btn-sm btn-ghost btn-circle me-2 hidden sm:inline-flex" external />
            <x-button icon="fab.x-twitter" link="https://github.com/robsontenorio/mary" class="btn-sm btn-ghost btn-circle me-2 hidden sm:inline-flex" external />
            <x-button icon="fab.github" link="https://github.com/robsontenorio/mary" class="btn-sm btn-ghost btn-circle me-2" external />
            <div class="border-l border-l-base-content/20 hidden sm:block">&nbsp;</div>
            <x-theme-toggle class="btn btn-sm btn-circle btn-ghost" />
            <div id="doc-search" class="me-2">...</div>
        </x-slot:actions>
    </x-nav>

    <x-main with-nav>
        <x-slot:sidebar drawer="main-drawer" class="bg-base-100">
            <x-menu activate-by-route active-bg-color="font-black" class="sm:mt-6">
                <x-menu-sub title="Get started" icon="o-sparkles" class="font-bold">
                    <x-menu-item title="Installation" link="/docs/installation" />
                    <x-menu-item title="Layout" link="/docs/layout" />
                    <x-menu-item title="Sidebar" link="/docs/sidebar" />
                    <x-menu-item title="Demos" link="/docs/demos" />
                    <x-menu-item title="Customizing" link="/docs/customizing" />
                    <x-menu-item title="Contributing" link="/docs/contributing" />
                    <x-menu-item title="Upgrading to v2" link="/docs/upgrading" />
                </x-menu-sub>

                <x-menu-sub title="Forms" icon="o-code-bracket-square">
                    <x-menu-item title="Form" link="/docs/components/form" />
                    <x-menu-item title="Input" link="/docs/components/input" />
                    <x-menu-item title="Select" link="/docs/components/select" />
                    <x-menu-item title="Checkbox" link="/docs/components/checkbox" />
                    <x-menu-item title="Toggle" link="/docs/components/toggle" />
                    <x-menu-item title="Group" link="/docs/components/group" />
                    <x-menu-item title="Radio" link="/docs/components/radio" />
                    <x-menu-item title="Color Picker" link="/docs/components/colorpicker" />
                    <x-menu-item title="Choices" link="/docs/components/choices" />
                    <x-menu-item title="Date Time" link="/docs/components/datetime" />
                    <x-menu-item title="File Upload" link="/docs/components/file" />
                    <x-menu-item title="Image Library" link="/docs/components/image-library" />
                    <x-menu-item title="Range Slider" link="/docs/components/range" />
                    <x-menu-item title="Tags" link="/docs/components/tags" />
                    <x-menu-item title="Textarea" link="/docs/components/textarea" />
                </x-menu-sub>

                <x-menu-sub title="List data" icon="o-list-bullet">
                    <x-menu-item title="List Item" link="/docs/components/list-item" />
                    <x-menu-item title="Table" link="/docs/components/table" />
                </x-menu-sub>

                <x-menu-sub title="Menus" icon="o-queue-list">
                    <x-menu-item title="Menu" link="/docs/components/menu" />
                    <x-menu-item title="Dropdown" link="/docs/components/dropdown" />
                </x-menu-sub>

                <x-menu-sub title="Dialogs" icon="o-window">
                    <x-menu-item title="Drawer" link="/docs/components/drawer" />
                    <x-menu-item title="Modal" link="/docs/components/modal" />
                    <x-menu-item title="Toast" link="/docs/components/toast" />
                </x-menu-sub>

                <x-menu-sub title="UI" icon="o-cursor-arrow-rays">
                    <x-menu-item title="Alert" link="/docs/components/alert" />
                    <x-menu-item title="Avatar" link="/docs/components/avatar" />
                    <x-menu-item title="Breadcrumbs" link="/docs/components/breadcrumbs" />
                    <x-menu-item title="Button" link="/docs/components/button" />
                    <x-menu-item title="Badges" link="/docs/components/badges" />
                    <x-menu-item title="Card" link="/docs/components/card" />
                    <x-menu-item title="Carousel" link="/docs/components/carousel" />
                    <x-menu-item title="Collapse" link="/docs/components/collapse" />
                    <x-menu-item title="Header" link="/docs/components/header" />
                    <x-menu-item title="Icon" link="/docs/components/icon" />
                    <x-menu-item title="Kbd" link="/docs/components/kbd" />
                    <x-menu-item title="Pin" link="/docs/components/pin" />
                    <x-menu-item title="Popover" link="/docs/components/popover" />
                    <x-menu-item title="Progress" link="/docs/components/progress" />
                    <x-menu-item title="Rating" link="/docs/components/rating" />
                    <x-menu-item title="Spotlight" link="/docs/components/spotlight" />
                    <x-menu-item title="Statistic" link="/docs/components/statistic" />
                    <x-menu-item title="Steps" link="/docs/components/steps" />
                    <x-menu-item title="Swap" link="/docs/components/swap" />
                    <x-menu-item title="Timeline" link="/docs/components/timeline" />
                    <x-menu-item title="Tabs" link="/docs/components/tabs" />
                    <x-menu-item title="Theme Toggle" link="/docs/components/theme-toggle" />
                </x-menu-sub>

                <x-menu-sub title="Third-party" icon="o-puzzle-piece">
                    <x-menu-item title="Calendar" link="/docs/components/calendar" />
                    <x-menu-item title="Chart" link="/docs/components/chart" />
                    <x-menu-item title="Code" link="/docs/components/code" />
                    <x-menu-item title="Date Picker" link="/docs/components/datepicker" />
                    <x-menu-item title="Diff" link="/docs/components/diff" />
                    <x-menu-item title="Image Gallery" link="/docs/components/image-gallery" />
                    <x-menu-item title="Markdown Editor" link="/docs/components/markdown" />
                    <x-menu-item title="Rich Text Editor" link="/docs/components/editor" />
                    <x-menu-item title="Signature" link="/docs/components/signature" />
                </x-menu-sub>

                <x-menu-separator />

                <x-menu-item title="Go to v1 docs" link="https://v1.mary-ui.com" icon="o-backward" external />
            </x-menu>
        </x-slot:sidebar>

        <x-slot:content class="lg:max-w-4xl !pt-10">

            {{ $slot }}

            <hr class="my-10 border-base-content/10" />

            <div class="text-center text-sm text-base-content/70">
                Made with
                <x-icon name="o-heart" class="text-pink-500 w-4 h-4" />
                by
                <a href="https://x.com/robsontenorio" class="underline">Robson Tenório</a> and <a href="https://github.com/robsontenorio/mary" class="underline">contributors</a>.
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
    <x-spotlight search-text="Type 'a' ..." />
</body>
</html>
