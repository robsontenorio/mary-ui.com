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
    <x-anchor title="A wrap" />
    <x-anchor title="Simple" size="text-2xl" class="mt-10 mb-5" />

    <div class="flex justify-between mt-10">
        <x-button label="Home page users" link="/bootcamp/05" icon="o-arrow-left" class="!no-underline btn-ghost" />
    </div>
</div>
