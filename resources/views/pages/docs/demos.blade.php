<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Demos")]
#[Layout('components.layouts.app', ['description' => "Gorgeous demos built with MaryUI"])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Demos" />

    <div class="grid grid-cols-2 gap-10">
        {{-- PAPER --}}
        <div>
            <div class="mockup-browser border bg-base-300">
                <div class="mockup-browser-toolbar"></div>
                <div>
                    <img src="/paper-demo.png" />
                </div>
            </div>
            <div class="mt-5">
                <x-header title="Paper" subtitle="The elegant and minimalist demo" size="text-xl">
                    <x-slot:actions>
                        <x-button icon="o-link" link="https://paper.mary-ui.com" class="btn-sm" external />
                    </x-slot:actions>
                </x-header>
            </div>
        </div>
    </div>

</div>
