<div>
<x-markdown class="markdown">
# Calendar

This component is a wrapper around [Vanilla Calendar](https://vanilla-calendar.com). 
We have simplified its API to make it act as a **readonly calendar** for easily displaying events. 
</x-markdown>

<x-alert icon="o-light-bulb" class="markdown mb-10">
    If you need an input for date selection stick with <a href="/docs/components/datetime" wire:navigate>DateTime</a> or <a href="/docs/components/datepicker" wire:navigate>DatePicker</a> component.
</x-alert>

<x-markdown>
### Install

<x-code no-render>
<head>
    ...
    <!-- Vanilla Calendar -->
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/themes/light.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/themes/dark.min.css" rel="stylesheet">    
    <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar/build/vanilla-calendar.min.js" defer></script>
</head>
</x-code>

In the following examples we use dinamic dates to keep this example udpated to current month.
Remember to configure **Tailwind safelist** when working with dinamic CSS classes.
</x-markdown>

<x-markdown>
### Single month
</x-markdown>

<x-code class="bg-base-200 grid grid-cols-1 lg:grid-cols-2 gap-5">
@verbatim

@php
    $events = [
        [
            'label' => 'Day off',
            'description' => 'Playing <u>tennis.</u>',
            'css' => '!bg-amber-200',
            'date' => now()->startOfMonth()->addDays(3), 
        ],
        [
            'label' => 'Health',
            'description' => 'I am sick',
            'css' => '!bg-green-200',
            'date' => now()->startOfMonth()->addDays(8), 
        ],
        [
            'label' => 'Laracon',
            'description' => 'Let`s go!',
            'css' => '!bg-blue-200',
            'range' => [
                    now()->startOfMonth()->addDays(13), 
                    now()->startOfMonth()->addDays(15)
            ]
        ],
    ];
@endphp

<x-calendar :events="$events" />

<!-- `locale` is any valid locale -->
<x-calendar locale="pt-BR" weekend-highlight />
@endverbatim
</x-code>

<x-markdown>
### Multiple months
</x-markdown>

<x-code class="bg-base-200">
@verbatim
@php
    $events = [
        [
            'label' => 'Business Travel',
            'description' => 'Series A founding',
            'css' => '!bg-red-200',
            'range' => [
                    now()->startOfMonth()->addDays(12), 
                    now()->startOfMonth()->addDays(19)
            ]
        ],
    ];
@endphp

<x-calendar :events="$events" months="3"  />
@endverbatim
</x-code>
</div>
