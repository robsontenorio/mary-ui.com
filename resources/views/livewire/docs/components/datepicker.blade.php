<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Datepicker')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI full featured datepicker component using Flatpickr with localization and global settings support.'])]
class extends Component {
    public ?string $myDate1 = '2029-06-12';

    public ?string $myDate2 = '2025-09-24';

    public ?string $myDate3 = null;

    public ?string $myDate4 = '2027-02-24';

    public ?string $myDate5 = '';

    public function save()
    {
    }
};

?>

<div class="docs">

    <x-anchor title="Date Picker" />

    <p>
        This component is a wrapper around <a href="https://flatpickr.js.org/examples/" target="_blank">flatpickr</a>, for more details refer to its docs.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        For native date time selection see <a href="/docs/components/datetime" wire:navigate>Date Time</a> component.
    </x-alert>

    <x-anchor title="Install" size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- Flatpickr  --}}
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            </head>
        @endverbatim
    </x-code>

    <x-anchor title="Usage" size="text-2xl" class="mt-10 mb-5" />

    <p>
        See all <code>$config</code> options at <a href="https://flatpickr.js.org/options/" target="_blank">flatpickr`s docs</a>.
    </p>

    <x-code class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        @verbatim('docs')
            @php
                $config1 = ['altFormat' => 'm/d/Y'];
                $config2 = ['mode' => 'range'];
            @endphp

            <x-datepicker label="Date" wire:model="myDate1" icon="o-calendar" hint="Hi!" />
            <x-datepicker label="Alt" wire:model="myDate2" icon-right="o-calendar" :config="$config1" />
            <x-datepicker label="Range" wire:model="myDate3" icon-right="o-calendar" :config="$config2" inline />
        @endverbatim
    </x-code>

    <x-anchor title="Localization and global settings" size="text-2xl" class="mt-10 mb-5" />

    <p>
        First add extra locale packages, then set up a global flatpickr object.
        See more at <a href="https://flatpickr.js.org/localization/" target="_blank">flatpickr`s docs</a>.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- Flatpickr  --}}
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                {{-- It will not apply locale yet  --}}
                <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
                <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
                <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>

                {{-- You need to set here the default locale or any global flatpickr settings--}}
                <script>
                    flatpickr.localize(flatpickr.l10ns.fr);
                </script>
            </head>
        @endverbatim
    </x-code>

    <x-anchor title="Per component" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Just add extra locale packages as described above, but <strong>don't apply</strong> global locale config. Instead, set locale on component config object.
    </p>

    <x-code class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        @verbatim('docs')
            @php
                $config1 = ['locale' => 'pt'];
                $config2 = ['locale' => 'fr'];
            @endphp

            <x-datepicker label="Portuguese" wire:model="myDate1" icon="o-calendar" :config="$config1" />
            <x-datepicker label="French" wire:model="myDate1" icon="o-calendar" :config="$config2" />
        @endverbatim
    </x-code>

    <x-anchor title="Plugins" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Here is a example for <code>monthSelectPlugin</code>. Please, refer to flatpickr`s docs for more plugins and how about to install them.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- MonthSelectPlugin  --}}
                <script src="https://unpkg.com/flatpickr/dist/plugins/monthSelect/index.js"></script>
                <link href="https://unpkg.com/flatpickr/dist/plugins/monthSelect/style.css" rel="stylesheet">
                @endverbatim
            </head>
    </x-code>

    <x-code class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        @verbatim('docs')
            @php
                $config1 = [
                    'plugins' => [
                         [
                            'monthSelectPlugin' => [
                                'dateFormat' => 'm.y',
                                'altFormat' => 'F Y',
                            ]
                         ]
                   ]
               ];
            @endphp

            <x-datepicker label="Month" wire:model="myDate5" icon="o-calendar" :config="$config1" />
        @endverbatim
    </x-code>
</div>
