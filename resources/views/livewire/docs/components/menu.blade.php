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

    <x-anchor title="Basic" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-dashed">
                <x-menu-item title="Home" icon="o-envelope" />
                <x-menu-item title="Messages" icon="o-paper-airplane" badge="78+" />
                <x-menu-item title="Hello" icon="o-sparkles" badge="new" badge-classes="!badge-warning" />

                <x-menu-item title="Internal link" icon="o-arrow-down" link="/docs/components/alert" />

                {{-- Notice external --}}
                <x-menu-item title="External link" icon="o-arrow-uturn-right" link="https://google.com" external />
            </x-menu>
        @endverbatim
    </x-code>

    <x-anchor title="Sections and Sub-menus" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-dashed">
                <x-menu-item title="Hello" />
                <x-menu-item title="There" />

                {{-- Simple separator --}}
                <x-menu-separator />

                {{-- Submenu --}}
                <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-menu-item title="Wifi" icon="o-wifi" />
                    <x-menu-item title="Archives" icon="o-archive-box" />
                </x-menu-sub>

                {{-- Separator with title and icon --}}
                <x-menu-separator title="Magic" icon="o-sparkles" />
                <x-menu-item title="Wifi" icon="o-wifi" />

            </x-menu>

        @endverbatim
    </x-code>

    <x-anchor title="Active state" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can manually define the active menu item by placing <code>active</code> attribute and choose a custom active color with <code>active-bg-color</code> attribute.
    </p>

    <x-code class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu active-bg-color="bg-blue-50" class="border border-dashed">
                {{-- Notice `active` --}}
                <x-menu-item title="Hi" active />
                <x-menu-item title="Some style" class="text-purple-500 font-bold" />
            </x-menu>
        @endverbatim
    </x-code>

    <br>

    <p>
        You can automatically activate a menu item when current route matches <code>link</code> and its nested route variations by using the <code>activate-by-route</code>
        attribute.
    </p>
    <p>
        For example, <code>link="/users"</code> will activate same menu item for:
    </p>
    <ul>
        <li>/users</li>
        <li>/users/23</li>
        <li>/users/23/edit</li>
        <li>/users/23/create</li>
        <li>/users/?q=mary</li>
        <li>...</li>
    </ul>

    <br>

    <x-code class="grid gap-5 justify-center">
        @verbatim('docs')
            {{-- Notice `activate-by-route` --}}
            <x-menu activate-by-route class="border border-dashed">
                {{-- It is active because you are right now browsing this url --}}
                <x-menu-item title="Home" link="/docs/components/menu" />

                <x-menu-item title="Party" />
            </x-menu>

        @endverbatim
    </x-code>
</div>
