<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Chart')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI chart component using Chart.Js that provides dozen of chart types.'])]
class extends Component {
    public array $myChart = [
        'type' => 'pie',
        'data' => [
            'labels' => ['Mary', 'Joe', 'Ana'],
            'datasets' => [
                [
                    'label' => '# of Votes',
                    'data' => [12, 19, 3],
                ],
            ],
        ],
    ];

    public function randomize()
    {
        Arr::set($this->myChart, 'data.datasets.0.data', [fake()->randomNumber(2), fake()->randomNumber(2), fake()->randomNumber(2)]);
    }

    public function switch()
    {
        $type = $this->myChart['type'] == 'bar' ? 'pie' : 'bar';

        Arr::set($this->myChart, 'type', $type);
    }
} ?>

<div class="docs">
    <x-anchor title="Chart" />

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need a simple progress bar see the <a href="/docs/components/progress" wire:navigate>Progress</a> component.
    </x-alert>

    <x-anchor title="Install" size="text-xl" class="mt-14" />

    <p>
        This component is a wrapper around <a href="https://www.chartjs.org" target="_blank">Chart.js</a>.
        So, it accepts any valid configuration described on its docs.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- Chart.js  --}}
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
            </head>
        @endverbatim
    </x-code>

    <x-anchor title="Usage" size="text-xl" class="mt-14" />

    <p>
        Check all available options in the <a href="https://www.chartjs.org" target="_blank">Chart.js</a> docs.
    </p>

    <x-code class="grid lg:grid-cols-2  items-start justify-center gap-10">
        @verbatim('docs')
            <div class="grid gap-5">
                <x-button label="Randomize" wire:click="randomize" class="btn-primary" spinner />
                <x-button label="Switch" wire:click="switch" spinner />
            </div>

            <x-chart wire:model="myChart" />
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        public array $myChart = [
            'type' => 'pie',
            'data' => [
                'labels' => ['Mary', 'Joe', 'Ana'],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [12, 19, 3],
                    ]
                ]
            ]
        ];

        public function randomize()
        {
            Arr::set($this->myChart, 'data.datasets.0.data', [fake()->randomNumber(2), fake()->randomNumber(2), fake()->randomNumber(2)]);
        }

        public function switch()
        {
            $type = $this->myChart['type'] == 'bar' ? 'pie' : 'bar';
            Arr::set($this->myChart, 'type', $type);
        }
    </x-code>
    {{--@formatter:on--}}
</div>
