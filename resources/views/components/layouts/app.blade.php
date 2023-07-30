<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @mary
</head>

<body>
    <x-nav class="bg-primary text-white">
        <x-slot:brand>
            Mary
        </x-slot:brand>
        <x-slot:actions>
            <x-button label="Like" icon="o-heart" />
        </x-slot:actions>
    </x-nav>

    <div class="grid grid-flow-col">
        <div>
            Menu

        </div>
        <div>
            {{ $slot }}
        </div>
    </div>

</body>

</html>
