<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Card')]
#[Layout('layouts.app', ['description' => 'Livewire UI card component with title, subtitle and actions slot.'])]
class extends Component {
    public function save(): void
    {
        sleep(1);
    }

    public function save2(): void
    {
        sleep(1);
    }
}
?>
<div class="docs">

    <x-anchor title="Card" />

    <x-anchor title="Basics" size="text-xl" class="mt-14" />

    <x-code-example class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-base-200">
        @verbatim('docs')
            <x-card title="Your stats" subtitle="Our findings about you" shadow separator>
                I have title, subtitle and separator.
            </x-card>

            <x-card title="Nice things">
                I am using slots here.

                <x-slot:figure>
                    <img src="https://picsum.photos/500/200" />
                </x-slot:figure>
                <x-slot:menu>
                    <x-button icon="o-share" class="btn-circle btn-sm" />
                    <x-icon name="o-heart" class="cursor-pointer" />
                </x-slot:menu>
                <x-slot:actions separator>
                    <x-button label="Ok" class="btn-primary" />
                </x-slot:actions>
            </x-card>
        @endverbatim
    </x-code-example>

    <x-anchor title="Progress indicator" size="text-xl" class="mt-14" />

    <p>
        This feature only works when you have in place <code>title</code> and <code>separator</code> attributes.
    </p>

    <x-code-example class="grid lg:grid-cols-2 gap-8 bg-base-200 ">
        @verbatim('docs')
            {{-- Notice `progress-indicator` --}}
            <x-card title="Your stats" subtitle="Always triggers" separator progress-indicator>
                <x-button label="Save" wire:click="save" />
            </x-card>

            {{-- Notice `progress-indicator` target --}}
            <x-card title="Your stats" subtitle="Only triggers with `save2`" separator progress-indicator="save2">
                <x-button label="Save2" wire:click="save2" />
            </x-card>

        @endverbatim
    </x-code-example>

    <x-anchor title="Styling" size="text-xl" class="mt-14" />

    <x-code-example class="bg-base-200 ">
        @verbatim('docs')
            {{-- Notice `progress-indicator` --}}
            <x-card title="Style" separator class="p-2 bg-warning/40" body-class="p-2 bg-info">
                Hey!
            </x-card>
        @endverbatim
    </x-code-example>

</div>
