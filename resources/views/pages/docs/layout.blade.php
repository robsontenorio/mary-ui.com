<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Layout')] class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Layout" />

    <p>
        You can play around by placing <strong>daisyUI/Tailwind</strong> classes on components or slots, from this example.
        Also, try to entirely remove some components or slots.
    </p>
    <p>
        You are free to make your own layout decision. But here is a suggestion to quickly get started. The Default Livewire app template is in
        <code>views/components/layouts/app.blade.php</code>.
    </p>

    <x-anchor title="All together" size="text-2xl" class="mt-10 mb-5" />

    <ul>
        <li>Navbar</li>
        <li>Sidebar</li>
        <li>Footer</li>
    </ul>

    <x-code no-render>
        @verbatim('docs')
            ...

            <head>
                ...

                {{-- Add this [tl! highlight:1 .animate-bounce] --}}
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>

            <body class="min-h-screen font-sans antialiased">

            {{-- The navbar with `sticky` and `full-width` --}}
            <x-nav sticky full-width>

                <x-slot:brand>
                    {{-- Drawer toggle for "main-drawer" --}}
                    <label for="main-drawer" class="lg:hidden mr-3">
                        <x-icon name="o-bars-3" class="cursor-pointer" />
                    </label>

                    {{-- Your logo --}}
                    My App
                </x-slot:brand>

                {{-- Right side actions --}}
                <x-slot:actions>
                    <a href="###">
                        <x-icon name="o-envelope" />
                        Messages</a>
                    <a href="###">
                        <x-icon name="o-bell" />
                        Notifications</a>
                </x-slot:actions>
            </x-nav>

            {{-- The main content with `full-width` --}}
            <x-main full-width>

                {{-- This is a sidebar that works also as a drawer on small screens --}}
                {{-- Notice the `main-drawer` reference here --}}
                <x-slot:sidebar drawer="main-drawer" class="bg-slate-200">

                    {{-- Activates the menu item when a route matches the `link` property --}}
                    <x-menu activate-by-route>
                        <x-menu-item title="Home" icon="o-home" link="###" />
                        <x-menu-item title="Messages" icon="o-envelope" link="###" />
                    </x-menu>
                </x-slot:sidebar>

                {{-- The `$slot` goes here --}}
                <x-slot:content>
                    {{ $slot }} {{-- [tl! highlight .animate-bounce] --}}
                </x-slot:content>

                {{-- Footer area --}}
                <x-slot:footer>
                    <hr />
                    <div class="p-6">
                        Footer
                    </div>
                </x-slot:footer>
            </x-main>
            </body>
        @endverbatim
    </x-code>

    <x-anchor title="Only sidebar" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This layout has only a collapsible Sidebar. It fits nice for an "enterprise layout", which needs more vertical spacing.
    </p>

    <x-code no-render>
        @verbatim('docs')
            ...

            <head>
                ...

                {{-- Add this [tl! highlight:1 .animate-bounce] --}}
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>

            <body class="min-h-screen font-sans antialiased">
            <x-main full-width>
                <x-slot:sidebar drawer="main-drawer" collapsible class="pt-3 bg-sky-800 text-white">

                    {{-- Hidden when collapsed --}}
                    <div class="hidden-when-collapsed ml-5 font-black text-4xl text-yellow-500">mary</div>

                    {{-- Display when collapsed --}}
                    <div class="display-when-collapsed ml-5 font-black text-4xl text-orange-500">m</div>

                    {{-- Custom `active menu item background color` --}}
                    <x-menu activate-by-route active-bg-color="bg-base-300/10">

                        {{-- User --}}
                        @if($user = auth()->user())
                            <x-list-item :item="$user" sub-value="username" no-separator no-hover class="!-mx-2 mt-2 mb-5 border-y border-y-sky-900">
                                <x-slot:actions>
                                    <div class="tooltip tooltip-left" data-tip="logoff">
                                        <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" />
                                    </div>
                                </x-slot:actions>
                            </x-list-item>
                        @endif

                        <x-menu-item title="Home" icon="o-home" link="/" />
                        <x-menu-item title="Yeah" icon="o-sparkles" link="####" />

                        <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                            <x-menu-item title="Wifi" icon="o-wifi" />
                            <x-menu-item title="Archives" icon="o-archive-box" />
                        </x-menu-sub>
                    </x-menu>
                </x-slot:sidebar>

                {{-- The `$slot` goes here --}}
                <x-slot:content>
                    {{ $slot }} {{-- [tl! highlight .animate-bounce] --}}
                </x-slot:content>
            </x-main>
            </body>
        @endverbatim
    </x-code>
</div>
