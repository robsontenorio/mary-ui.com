<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component
{
    #[Rule('required|date')]
    public ?string $myDate = null;

    public function save()
    {
        sleep(1);

        $this->validate();
    }
};

?>

<div>

<x-markdown>
# Date Time

### Native HTML

If you have no constraints regards on date selection, just sticky with this approach. It renders nice natively on every device.

</x-markdown>

<x-code class="grid gap-5">
@verbatim
<x-datetime label="My date" wire:model="myDate" icon="o-calendar"  />
<x-datetime label="Right icon" wire:model="myDate" icon-right="o-calendar" />
<x-datetime label="Date + Time" wire:model="myDate" icon="o-calendar" type="datetime-local" />
<x-datetime label="Time" wire:model="myDate" icon="o-calendar" type="time" />
@endverbatim
</x-code>
</div>