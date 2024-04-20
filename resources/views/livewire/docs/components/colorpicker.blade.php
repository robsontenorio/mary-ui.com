<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new
#[Title('Color Picker')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI native color picker component'])]
class extends Component {
    #[Validate('required|hex_color')]
    public string $color1 = '#8fe6d4';

    #[Validate('required|hex_color')]
    public string $color2 = '#e32400';

    #[Validate('required|hex_color')]
    public string $color3 = '';

    public function save()
    {
        $this->validate();
        //dump($this->color1, $this->color2, $this->color3);
    }
}; ?>

<div class="docs">
    <x-anchor title="Color Picker" />

    <p>
        This components uses the native OS color picker.
    </p>

    <x-code class="grid gap-10">
        @verbatim('docs')
            <x-colorpicker wire:model="color1" />

            <x-colorpicker wire:model="color2" label="Select a color" hint="Please, a nice color" icon="o-swatch" />

            <x-colorpicker wire:model="color3" label="Select a color" inline required />
        @endverbatim
    </x-code>
</div>
