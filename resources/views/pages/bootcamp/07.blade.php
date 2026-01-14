<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('maryUI Bootcamp - A wrap')]
#[Layout('layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="A wrap" />

    <p>
        We could expand this Bootcamp forever by adding more and more cool features, but we are done for now.
    </p>

    <p>
        Take a look at docs and see by yourself on how much you can do with less code.
        Every component has been carefully handcrafted to provide an extreme DX/UX/UI.
    </p>

    <p>
        Also check the <a href="/docs/demos">maryUI demos</a> and get amazed by how much great stuff you can do.
        Each demo contains <strong>real world code</strong> and straight approaches to get the most out of maryUI and Livewire.
    </p>

    <p>
        If you are enjoying maryUI <a href="https://github.com/robsontenorio/mary" target="_blank">give it a star</a> on GitHub
        and <a href="https://github.com/sponsors/robsontenorio" target="_blank">sponsor it</a>.
    </p>

    <p>
        See you on <a href="https://twitter.com/robsontenorio" target="_blank">Twitter!</a>
    </p>

    <div class="flex justify-between mt-10 mb-40">
        <x-button label="Authentication" link="/bootcamp/06" icon="o-arrow-left" class="!no-underline btn-ghost" />
    </div>
</div>
