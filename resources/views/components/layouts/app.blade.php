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
            Mary
        </x-slot:brand>
        <x-slot:actions>
            <x-button label="Like" icon="o-heart" />
        </x-slot:actions>
    </x-nav>

    <x-main>
        <x-slot:sidebar>
            <div>
                <a href="/docs" wire:navigate>Overview</a>
            </div>
            <div>
                <a href="/docs/installation" wire:navigate>Installation</a>
            </div>
            <div>
                <a href="/docs/components/layout" wire:navigate>Layout</a>
            </div>
            <div>
                <a href="/docs/components/alert" wire:navigate>Alert</a>
            </div>
            <div>
                <a href="/docs/components/button" wire:navigate>Button</a>
            </div>
            <div>
                <a href="/docs/components/card" wire:navigate>Card</a>
            </div>
            <div>
                <a href="/docs/components/drawer" wire:navigate>Drawer</a>
            </div>
            <div>
                <a href="/docs/components/form" wire:navigate>Form</a>
            </div>
            <div>
                <a href="/docs/components/header" wire:navigate>Header</a>
            </div>
            <div>
                <a href="/docs/components/icon" wire:navigate>Icon</a>
            </div>
            <div>
                <a href="/counter" wire:navigate>Counter</a>
            </div>
        </x-slot:sidebar>
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{-- TODO: just add an empty livewire component to make wire:navigate work on top level --}}
    {{-- Is it a bug because were are using folio for managing top level routes ??? --}}
    <livewire:nothing />

</body>

</html>
