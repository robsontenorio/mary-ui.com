<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Calendar')]
#[Layout('layouts.app', ['description' => 'Livewire UI calendar component to easily display events using Vanilla Calendar.'])]
class extends Component {
}
?>
<div class="docs">
    <x-anchor title="Calendar" />

    <p>
        This component is a wrapper around <a href="https://vanilla-calendar.pro" target="_blank">Vanilla Calendar</a>.
        We have simplified its API to make it act as a <strong>readonly calendar</strong> for easily displaying events.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need an input for date selection stick with <a href="/docs/components/datetime" wire:navigate>DateTime</a> or <a href="/docs/components/datepicker" wire:navigate>DatePicker</a>
        component.
    </x-alert>

    <x-anchor title="Install" size="text-xl" class="mt-14" />

    <x-code-example no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- Vanilla Calendar --}}
                <script src="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/vanilla-calendar-pro@2.9.6/build/vanilla-calendar.min.css" rel="stylesheet">
            </head>
        @endverbatim
    </x-code-example>

    <p>
        In the following examples we use dynamic dates to keep this example udpated to current month.
        Remember to configure <strong>Tailwind safelist</strong> when working with dynamic CSS classes.
    </p>

    <x-anchor title="Single month" size="text-xl" class="mt-14" />

    <x-code-example class="bg-base-200 grid grid-cols-1 lg:grid-cols-2 gap-5">
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
                        'label' => 'Event at same day',
                        'description' => 'Hey there!',
                        'css' => '!bg-amber-200',
                        'date' => now()->startOfMonth()->addDays(3),
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

            {{-- Shortcuts config to `locale`, `sunday-start` and weekend-highlight --}}
            <x-calendar locale="pt-BR" weekend-highlight sunday-start />
        @endverbatim
    </x-code-example>

    <x-anchor title="Multiple months" size="text-xl" class="mt-14" />

    <x-code-example class="bg-base-200">
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
    </x-code-example>
</div>
