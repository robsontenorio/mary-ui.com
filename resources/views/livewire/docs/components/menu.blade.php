<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Menu')] class extends Component {
}
?>

<div class="docs">
    <x-header title="Menu" />

    <p>
        This component plays nice with <a href="/docs/components/dropdown" wire:navigate>Dropdown</a> and <a href="/docs/layout#only-sidebar-collapsible" wire:navigate>Layout</a>`s
        sidebar slot.
    </p>

    <x-code>
        @verbatim('docs')
            {{-- Auto activate menu item with  `activate-by-route`--}}
            <x-menu activate-by-route active-bg-color="bg-red-50">
                <x-menu-item title="Messages" icon="o-envelope" />
                <x-menu-item title="Navigate to Alert docs" icon="o-arrow-right" link="/docs/components/alert" />

                <x-menu-separator />

                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Wifi" icon="o-wifi" />
                    <x-menu-item title="Archives" icon="o-archive-box" />
                </x-menu-sub>

                <x-menu-separator title="Magic" icon="o-sparkles" />
                <x-menu-item title="Hello" />

                {{-- When route matches `link` property it activates menu --}}
                <x-menu-item title="Active state" link="/docs/components/menu" />

                <x-menu-separator title="Tricks" />
                <x-menu-item title="Hi" />
                <x-menu-item title="Some style" class="text-purple-500 font-bold" />
            </x-menu>
        @endverbatim
    </x-code>

</div>
