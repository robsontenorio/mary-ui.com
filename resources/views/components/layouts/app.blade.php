<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-100 min-h-screen pb-40 font-sans antialiased">
    <x-nav sticky>
        <x-slot:brand>
            <a href="/" wire:navigate>
                <x-mary-brand />
            </a>
        </x-slot:brand>
        <x-slot:actions>
            <x-button label="Like" icon="o-heart" />
        </x-slot:actions>
    </x-nav>

    <x-main>
        <x-slot:sidebar>
            <x-menu title="Get started" icon="o-sparkles" separator>
                <x-menu-item title="Overview" link="/" />
                <x-menu-item title="Installation" link="/docs/installation" />

                <x-menu-separator title="Layout" icon="o-view-columns" />
                <x-menu-item title="Layout" link="/docs/components/layout" />

                <x-menu-separator title="Forms" icon="o-code-bracket-square" />
                <x-menu-item title="Form" link="/docs/components/form" />
                <x-menu-item title="Input" link="/docs/components/input" />
                <x-menu-item title="Select" link="/docs/components/select" />

                <x-menu-separator title="UI" icon="o-cursor-arrow-rays" />
                <x-menu-item title="Alert" link="/docs/components/alert" />
                <x-menu-item title="Button" link="/docs/components/button" />
                <x-menu-item title="Card" link="/docs/components/card" />
                <x-menu-item title="Drawer" link="/docs/components/drawer" />

                <x-menu-item title="Header" link="/docs/components/header" />
                <x-menu-item title="Icon" link="/docs/components/icon" />

                <x-menu-item title="Item" link="/docs/components/list-item" wir" />
                <x-menu-item title="Modal" link="/docs/components/modal" />
                <x-menu-item title="Tabs" link="/docs/components/tabs" />
                <x-menu-item title="Toggle" link="/docs/components/toggle" />

                <x-menu-item title="Menu" link="/docs/components/menu" />
                <x-menu-item title="Counter" link="/counter" />
            </x-menu>
        </x-slot:sidebar>
        <x-slot:content>
            {{ $slot }}

            <hr class="mt-20 mb-10" />
            <x-mary-brand />
        </x-slot:content>
    </x-main>

    {{-- TODO: just add an empty livewire component to make wire:navigate work on top level --}}
    {{-- Is it a bug because were are using folio for managing top level routes ??? --}}
    <livewire:nothing />

</body>

</html>
