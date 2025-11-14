<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

new
#[Title('Color Picker')]
#[Layout('layouts.app', ['description' => 'Livewire UI native color picker component'])]
class extends Component {
    #[Validate('required|hex_color')]
    public string $color1 = '';

    #[Validate('required|hex_color')]
    public string $color2 = '#e32400';

    #[Validate('required|hex_color')]
    public string $color3 = '#8fe6d4';

    #[Validate('required|hex_color')]
    public string $color4 = '';

    public function save()
    {
        $this->validate();
        //dump($this->color1, $this->color2, $this->color3);
    }
}; ?>

<div class="docs">
    <x-anchor title="Color Picker" />

    <p>
        This component uses the native OS color picker.
    </p>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            <x-colorpicker wire:model="color1" label="Pick a color" hint="A nice color" />

            <x-colorpicker wire:model="color2" label="Icon" icon="o-swatch" />

            <x-colorpicker wire:model="color3" label="Suffix" suffix="Hex code" />

            <span></span> <!-- [tl! .docs-hide] -->
            <x-colorpicker wire:model="color4" label="Color" placeholder="Inline example" inline />
        @endverbatim
    </x-code-example>
</div>
