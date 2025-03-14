<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - Introduction')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">

    <div>
        <x-anchor title="Bootcamp" />

        <p>
            Let's build a full-featured CRUD in no time using straight approaches to get the most out of maryUI and Livewire.
            Get <span class="decoration-amber-300 underline decoration-2 font-bold">amazed</span> by how much you can do with
            <span class="decoration-amber-300 underline decoration-2 font-bold">minimal effort</span>.
        </p>
        <p>
            Along this journey you will spot some cool tips and tricks to build a nice UI and keep your code elegant.
            We will show you how easy it is to start from the ground <span class="decoration-amber-300 underline decoration-2 font-bold">with no starter kits</span>.
        </p>

        <x-button label="Ready? Go!" link="/bootcamp/02" icon-right="o-arrow-right" class="btn-neutral my-5 !no-underline" />
    </div>
    <div class="px-10 my-10">
        <img src="/bootcamp/01-c.png" class="rounded-lg border border-base-300 shadow-xl rotate-1" />
    </div>

    <div class="flex gap-5 overflow-x-auto pb-10 pt-5 px-3">
        <img src="/bootcamp/01-a.png" class="rounded-lg border border-base-300 h-64 -rotate-1" />
        <img src="/bootcamp/01-b.png" class="rounded-lg border border-base-300 h-64 -rotate-1" />
        <img src="/bootcamp/01-e.png" class="rounded-lg border border-base-300 h-64 rotate-1" />
        <img src="/bootcamp/01-d.png" class="rounded-lg border border-base-300 h-64 -rotate-1" />
    </div>

    <div class="text-center my-10">
        <x-button label=" Let's go" link="/bootcamp/02" icon-right="o-arrow-right" class="btn-neutral !no-underline" />
    </div>

</div>
