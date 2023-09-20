<?php

use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Datetime')] class extends Component
{
    #[Rule('required|date')]
    public ?string $myDate = '2029-06-12';

    public function save()
    {

    }
};

?>

<div>

<x-markdown>
# Date Time

### Native HTML

If you have no constraints regards on date selection, just sticky with this approach. It renders nice natively on every device and cover most of use cases.
</x-markdown>

<x-alert icon="o-light-bulb" class="markdown mb-10">
    For advanced date picker see <a href="/docs/components/datepicker" wire:navigate>Date Picker</a> component.
</x-alert>

<x-code class="grid gap-5">
@verbatim
<x-datetime label="My date" wire:model="myDate" icon="o-calendar"  />

<x-datetime label="Right icon" wire:model="myDate" icon-right="o-calendar" />

<!-- Note `type="datetime-local"` -->
<x-datetime label="Date + Time" wire:model="myDate" icon="o-calendar" type="datetime-local" />

<!-- Note `type="time"` -->
<x-datetime label="Time" wire:model="myDate" icon="o-calendar" type="time" />
@endverbatim
</x-code>
</div>
