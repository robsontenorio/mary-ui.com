<?php

use Livewire\Volt\Component;

new class extends Component
{
    public ?string $myDate1 = '2029-06-12';

    public ?string $myDate2 = '2025-09-24';

    public ?string $myDate3 = null;

    public ?string $myDate4 = '2027-02-24';

    public function save()
    {

    }
};

?>

<div>

<x-markdown class="markdown">
# Date Picker

This component is a wrapper around `flatpickr`. All usage examples and config options are available on [flatpickr`s site](https://flatpickr.js.org/examples/).
</x-markdown>


<x-alert icon="o-light-bulb" class="markdown mb-10">
    For native date time selection see <a href="/docs/components/datetime" wire:navigate>Date Time</a> component.
</x-alert>

<x-markdown>
### Install
</x-markdown>

<x-code no-render>
<head>
    ...

    <!-- Flatpickr  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
</x-code>

<x-markdown class="markdown">
### Usage

See all `$config` options at [flatpickr](https://flatpickr.js.org/options/).
</x-markdown>

<x-code class="grid grid-cols-1 lg:grid-cols-2 gap-5">
@verbatim
@php
    $config1 = ['altFormat' => 'm/d/Y'];
    $config2 = ['mode' => 'range'];
@endphp

<x-datepicker label="Date" wire:model="myDate1" icon="o-calendar" />
<x-datepicker label="Alt" wire:model="myDate2" icon-right="o-calendar" :config="$config1" />
<x-datepicker label="Range" wire:model="myDate3" icon-right="o-calendar" :config="$config2" hint="Select start and end date" />
@endverbatim
</x-code>



<x-markdown class="markdown">
### Localization

Just add extra locale packages. See more at [flatpickr`s site](https://flatpickr.js.org/localization/).

</x-markdown>

<x-code no-render>
<head>
    ...

    <!-- Flatpickr  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- By default it will not apply locale  -->
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>    
    <script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>    
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>    

    <!-- Just set here default locale or any global flatpickr settings-->
    <script>
        flatpickr.localize(flatpickr.l10ns.fr);
    </script>
</head>
</x-code>


<x-markdown>
#### Per component

Just add extra locale packages as described above, but **don't apply** global locale config. Instead set locale on component config object.
</x-markdown>

<x-code class="grid grid-cols-1 lg:grid-cols-2 gap-5">
@verbatim
@php
    $config1 = ['locale' => 'pt'];
    $config2 = ['locale' => 'fr'];
@endphp

<x-datepicker label="Portuguese" wire:model="myDate1" icon="o-calendar" :config="$config1" />
<x-datepicker label="French" wire:model="myDate1" icon="o-calendar" :config="$config2" />
@endverbatim
</x-code>
</div>