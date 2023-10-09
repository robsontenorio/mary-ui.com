<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Icon')] class extends Component {
}
?>
<div class="docs">

    <x-header title="Icon" />

    <p>
        All icons are powered by <a href="https://blade-ui-kit.com/blade-icons?set=1#search" target="_blank">Blade Hero Icons</a>.
    </p>

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-icon name="o-envelope" />

            <x-icon name="s-envelope" class="w-9 h-9 text-green-500" />

            <x-icon name="o-envelope" class="w-12 h-12 bg-orange-500 text-white p-2 rounded-full" />
        @endverbatim
    </x-code>
</div>
