<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Stat')] class extends Component {
}
?>
<div class="docs">
    <x-anchor title="Stat" />

    <x-code class="bg-base-200 flex flex-wrap gap-5">
        @verbatim('docs')
            <x-stat title="Messages" value="44" icon="o-envelope" />

            <x-stat title="Sales" description="This month" value="22.124" icon="o-arrow-trending-up" />

            <x-stat
                title="Sales"
                description="This month"
                value="22.124"
                icon="o-arrow-trending-down"
                class="text-orange-500"
                color="text-pink-500" />
        @endverbatim
    </x-code>
</div>
