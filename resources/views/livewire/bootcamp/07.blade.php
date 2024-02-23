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

    <p>
        We could to expand this Bootcamp forever adding cool features, but we are done for now.
    </p>

    <p>
        Take a look on docs and see by yourself how much you can do with less code.
        Every component has been carefully handcrafted to provide extreme DX.
    </p>

    <p>
        Deep dive into the source code of <strong>maryUI demos</strong> and get amazed how much you can do with minimal effort learning by example.
        Each demo contains <strong>real world code</strong> and straight approaches to get the most out of maryUI and Livewire.
    </p>

    <p>
        If you are enjoying maryUI <strong>give it a start</strong> on GitHub and <strong>sponsor it</strong>.
    </p>

    <p>
        See you on Twitter!
    </p>

    <div class="flex justify-between mt-10">
        <x-button label="Jetstream & Breeze" link="/bootcamp/05" icon="o-arrow-left" class="!no-underline btn-ghost" />
    </div>
</div>
