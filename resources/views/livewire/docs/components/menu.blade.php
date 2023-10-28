<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Menu')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI menu item component with submenus, link, icons, badge, automatic active state per route and customizable slots.'])]
class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Menu" />

    <p>
        This component plays nice with <a href="/docs/components/dropdown" wire:navigate>Dropdown</a> and <a href="/docs/layout#only-sidebar-collapsible" wire:navigate>Layout</a>`s
        sidebar slot.
    </p>

    <x-code class="grid gap-5 justify-center">
        @verbatim('docs')
            {{-- Auto activate menu item with `activate-by-route`--}}
            <x-menu activate-by-route active-bg-color="bg-blue-50" class="border border-dashed">

                <x-menu-item title="Messages" icon="o-envelope" badge="78+" />
                <x-menu-item title="Navigate to Alert docs" icon="o-arrow-right" link="/docs/components/alert" />

                <x-menu-separator />

                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Wifi" icon="o-wifi" />
                    <x-menu-item title="Archives" icon="o-archive-box" />
                </x-menu-sub>

                <x-menu-separator title="Magic" icon="o-sparkles" />
                <x-menu-item title="Hello" badge="7" badge-classes="!badge-warning !text-red-500" />

                {{-- When route matches `link` property it activates menu --}}
                <x-menu-item title="Active state" link="/docs/components/menu" />

                <x-menu-separator title="Tricks" />
                <x-menu-item title="Hi" />
                <x-menu-item title="Some style" class="text-purple-500 font-bold" />

            </x-menu>
        @endverbatim
    </x-code>

</div>
