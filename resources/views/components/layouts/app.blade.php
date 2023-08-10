<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('/favicon.ico') }}" color="#ff2d20">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <span class="bg-yellow-300 rounded text-sm text-black px-2 py-0.5 font-bold -rotate-3">
                <span class="hidden lg:inline">This is a</span> WIP
            </span>

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
        <x-slot:sidebar drawer="main-drawer">
            <x-menu title="Get started" icon="o-sparkles" separator>
                <x-menu-item title="Overview" link="/" />
                <x-menu-item title="Installation" link="/docs/installation" />
                <x-menu-item title="Layout" link="/docs/layout" />
                <x-menu-item title="Contributing" link="/docs/contributing" />

                <x-menu-separator title="Forms" icon="o-code-bracket-square" />
                <x-menu-item title="Form" link="/docs/components/form" />
                <x-menu-item title="Input" link="/docs/components/input" />
                <x-menu-item title="Select" link="/docs/components/select" />
                <x-menu-item title="Toggle" link="/docs/components/toggle" />

                <x-menu-separator title="UI" icon="o-cursor-arrow-rays" />
                <x-menu-item title="Alert" link="/docs/components/alert" />
                <x-menu-item title="Button" link="/docs/components/button" />
                <x-menu-item title="Card" link="/docs/components/card" />
                <x-menu-item title="Drawer" link="/docs/components/drawer" />

                <x-menu-item title="Header" link="/docs/components/header" />
                <x-menu-item title="Icon" link="/docs/components/icon" />

                <x-menu-item title="List Item" link="/docs/components/list-item" />
                <x-menu-item title="Menu" link="/docs/components/menu" />
                <x-menu-item title="Modal" link="/docs/components/modal" />
                <x-menu-item title="Tabs" link="/docs/components/tabs" />
            </x-menu>
        </x-slot:sidebar>
        <x-slot:content class="lg:max-w-4xl">
            {{ $slot }}
        </x-slot:content>
        <x-slot:footer>
            <hr />
            <div class="justify-center items-baseline flex my-10">
                <x-mary-brand />
            </div>
        </x-slot:footer>
    </x-main>

    {{-- TODO: just add an empty livewire component to make wire:navigate work on top level --}}
    {{-- Is it a bug because were are using folio for managing top level routes ??? --}}
    <livewire:nothing />

</body>

</html>
