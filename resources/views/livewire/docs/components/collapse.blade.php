<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Collapse and Accordion')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI Collapse and Accordion components are used for showing and hiding content but only one item can stay open at a time.'])]
class extends Component {
    public bool $show = false;

    public string $group = 'group1';
}; ?>

<div class="docs">

    <x-anchor title="Collapse" />

    <p>
        This component can be used for showing and hiding content. It can be used standalone or wrapped into the "Accordion" component.
    </p>

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            <x-collapse separator>
                <x-slot:heading>
                    Hello
                </x-slot:heading>
                <x-slot:content>
                    You!
                </x-slot:content>
            </x-collapse>
        @endverbatim
    </x-code>

    <x-anchor title="Livewire" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            <x-collapse wire:model="show" separator class="bg-base-200">
                <x-slot:heading>Hey</x-slot:heading>
                <x-slot:content>There!</x-slot:content>
            </x-collapse>
        @endverbatim
    </x-code>

    <x-anchor title="Style and alternative icon" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            <x-collapse collapse-plus-minus>
                <x-slot:heading class="bg-warning/20">
                    How ...
                </x-slot:heading>
                <x-slot:content class="bg-primary/10">
                    <div class="mt-5">Are you?</div>
                </x-slot:content>
            </x-collapse>
        @endverbatim
    </x-code>

    <x-anchor title="No icon" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            <x-collapse no-icon>
                <x-slot:heading>
                    How ...
                </x-slot:heading>
                <x-slot:content>
                    Are you ?
                </x-slot:content>
            </x-collapse>
        @endverbatim
    </x-code>

    <x-anchor title="Accordion" size="text-xl" class="mt-14" />

    <p>
        You can group multiple <code>x-collapse</code> by wrapping it on a <code>x-accordion</code> component.
    </p>

    <x-code>
        @verbatim('docs')
            <x-accordion wire:model="group">
                <x-collapse name="group1">
                    <x-slot:heading>Group 1</x-slot:heading>
                    <x-slot:content>Hello 1</x-slot:content>
                </x-collapse>
                <x-collapse name="group2">
                    <x-slot:heading>Group 2</x-slot:heading>
                    <x-slot:content>Hello 2</x-slot:content>
                </x-collapse>
                <x-collapse name="group3">
                    <x-slot:heading>Group 3</x-slot:heading>
                    <x-slot:content>Hello 3</x-slot:content>
                </x-collapse>
            </x-accordion>
        @endverbatim
    </x-code>

    <x-code no-render language="php">
        @verbatim('docs')
            public string $group = 'group1';
        @endverbatim
    </x-code>
</div>
