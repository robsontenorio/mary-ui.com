<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Card')] class extends Component {
}
?>
<div class="docs">

    <x-anchor title="Card" />

    <x-code class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-base-200">
        @verbatim('docs')
            <x-card title="Your stats" subtitle="Our finds about you" shadow separator>
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

</div>
