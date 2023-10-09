<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Calendar')] class extends Component {
}
?>
<div class="docs">
    <x-header title="Calendar" with-anchor />

    <p>
        This component is a wrapper around <a href="https://vanilla-calendar.com" target="_blank">Vanilla Calendar</a>.
        We have simplified its API to make it act as a <strong>readonly calendar</strong> for easily displaying events.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need an input for date selection stick with <a href="/docs/components/datetime" wire:navigate>DateTime</a> or <a href="/docs/components/datepicker" wire:navigate>DatePicker</a>
        component.
    </x-alert>

    <x-header title="Install" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- Vanilla Calendar --}}
                <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/vanilla-calendar.min.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/themes/light.min.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/themes/dark.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/@uvarov.frontend/vanilla-calendar@2.6.2/build/vanilla-calendar.min.js" defer></script>
            </head>
        @endverbatim
    </x-code>

    <p>
        In the following examples we use dynamic dates to keep this example udpated to current month.
        Remember to configure <strong>Tailwind safelist</strong> when working with dynamic CSS classes.
    </p>

    <x-header title="Single month" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <x-code class="bg-base-200 grid grid-cols-1 lg:grid-cols-2 gap-5">
        @verbatim('docs')
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

            {{-- `locale` is any valid locale --}}
            <x-calendar locale="pt-BR" weekend-highlight />
        @endverbatim
    </x-code>

    <x-header title="Multiple months" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <x-code class="bg-base-200">
        @verbatim('docs')
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

            <x-calendar :events="$events" months="3" />
        @endverbatim
    </x-code>
</div>
