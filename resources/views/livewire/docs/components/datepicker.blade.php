<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Datepicker')] class extends Component {
    public ?string $myDate1 = '2029-06-12';

    public ?string $myDate2 = '2025-09-24';

    public ?string $myDate3 = null;

    public ?string $myDate4 = '2027-02-24';

    public function save()
    {
    }
};

?>

<div class="docs">

    <x-header title="Date Picker" with-anchor />

    <p>
        This component is a wrapper around <a href="https://flatpickr.js.org/examples/" target="_blank">flatpickr`s docs</a>.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        For native date time selection see <a href="/docs/components/datetime" wire:navigate>Date Time</a> component.
    </x-alert>

    <x-header title="Install" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- Flatpickr  --}}
                @maryCSS('flatpickr/flatpickr.min.css')
                @maryJS('flatpickr/flatpickr.min.js')
            </head>
        @endverbatim
    </x-code>

    <x-header title="Usage" with-anchor size="text-2xl" class="mt-10 mb-5" />

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
            <x-datepicker label="Range" wire:model="myDate3" icon-right="o-calendar" :config="$config2" />
        @endverbatim
    </x-code>

    <x-header title="Localization and global settings" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        First add extra locale packages, then set up a global flatpickr object.
        See more at <a href="https://flatpickr.js.org/localization/" target="_blank">flatpickr`s docs</a>.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- Flatpickr  --}}
                @maryCSS('flatpickr/flatpickr.min.css')
                @maryJS('flatpickr/flatpickr.min.js')

                {{-- It will not apply locale yet  --}}
                @maryJS('flatpickr/lang/pt.js')
                @maryJS('flatpickr/lang/fr.js')
                @maryJS('flatpickr/lang/es.js')

                {{-- You need to set here the default locale or any global flatpickr settings--}}
                <script>
                    flatpickr.localize(flatpickr.l10ns.fr);
                </script>
            </head>
        @endverbatim
    </x-code>

    <x-header title="Per component" with-anchor size="text-2xl" class="mt-10 mb-5" />

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
</div>
