<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Checkbox')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI checkbox component with builtin validation support.'])]
class extends Component {
    public bool $item1 = true;

    public bool $item2 = false;

    public bool $item3 = false;

    #[Rule('required')]
    public ?bool $item4 = null;

    public function save(): void
    {
        $this->validate();
    }
}

?>

<div class="docs">

    <x-anchor title="Checkbox" />

    <x-code class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-checkbox label="Left" wire:model="item1" hint="You agree with terms" />
            <hr />

            <x-checkbox label="Right" wire:model="item2" right />
            <hr />

            <x-checkbox label="Right Tight" wire:model="item3" class="checkbox-warning" right tight />
            <hr />

            {{-- Notice Tailwind alignment class for long lines --}}
            <x-checkbox wire:model="item4" class="self-start">
                <x-slot:label>
                    This is <br>a very <br> long line.
                </x-slot:label>
            </x-checkbox>
        @endverbatim
    </x-code>
</div>
