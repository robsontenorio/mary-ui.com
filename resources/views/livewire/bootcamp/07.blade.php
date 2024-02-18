<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - A wrap')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Wrap" />
    <x-anchor title="Simple" size="text-2xl" class="mt-10 mb-5" />

    <p>
        We could extend this Bootcamp infinitely adding cool features ...
    </p>

    <p>
        Keep an eye on maryUI demos to check upcoming real word demos.... (mesma frase da pagina do demo sobre codigo real e tirar o maximo de proveito).
    </p>
</div>
