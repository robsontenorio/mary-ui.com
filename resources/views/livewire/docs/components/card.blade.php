<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Card')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI card component with title, subtitle and actions slot.'])]
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

    <x-anchor title="Basics" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-base-200">
        @verbatim('docs')
            <x-card title="Your stats" subtitle="Our findings about you" shadow separator>
                I have title, subtitle, separator and shadow.
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
                <x-slot:actions>
                    <x-button label="Ok" class="btn-primary" />
                </x-slot:actions>
            </x-card>
        @endverbatim
    </x-code>

    <x-anchor title="Progress indicator" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This features only works when you have in place <code>title</code> and <code>separator</code> attributes.
    </p>

    <x-code class="grid lg:grid-cols-2 gap-8 bg-base-200 ">
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
    </x-code>


    <x-anchor title="SEO headings" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This feature allows you to decide which <code>h</code> HTML tags to use to improve SEO
    </p>

    <x-code class="grid lg:grid-cols-2 gap-8 bg-base-200 ">
        @verbatim('docs')
            <x-card titleSEO="h1" title="Your stats" subtitleSEO="h2" subtitle="Always triggers" separator>
                <x-button label="Save" wire:click="save" />
            </x-card>
        @endverbatim
    </x-code>

</div>
