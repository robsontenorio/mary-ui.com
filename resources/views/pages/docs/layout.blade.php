<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Layout')] class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Layout" />

    <p>
        You can play around by placing <strong>daisyUI/Tailwind</strong> classes on components or slots, from the examples bellow.
        Also, try to entirely remove some components or slots.
    </p>
    <p>
        You are free to make your own layout decision. But here is a suggestion to quickly get started. The default Livewire app template lives in
        <code>views/components/layouts/app.blade.php</code>.
    </p>

    <x-anchor title="Only sidebar" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This layout has only a collapsible Sidebar. It fits nice for an "enterprise layout", which needs more vertical spacing.
    </p>
    <p>
        If you have used the <strong>automatic installer</strong> you already have this layout in place.
    </p>

    <x-code no-render>
        @verbatim('docs')
            ...

            <head>
                ...

                {{-- Add this [tl! highlight:1 .animate-bounce] --}}
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>

            <body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

                {{-- NAVBAR mobile only --}}
                <x-nav sticky class="lg:hidden">
                    <x-slot:brand class="flex gap-2 items-center">
                        <x-icon name="o-square-3-stack-3d" class="text-primary" />
                        <div>App</div>
                    </x-slot:brand>
                    <x-slot:actions>
                        <label for="main-drawer" class="lg:hidden mr-3">
                            <x-icon name="o-bars-3" class="cursor-pointer" />
                        </label>
                    </x-slot:actions>
                </x-nav>

                {{-- MAIN --}}
                <x-main full-width>
                    {{-- SIDEBAR --}}
                    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

                        {{-- BRAND --}}
                        <div class="p-6 pt-3 flex gap-3 items-center h-20">
                            <x-icon name="o-square-3-stack-3d" class="text-primary" />
                            <div class="hidden-when-collapsed">App</div>
                        </div>

                        {{-- MENU --}}
                        <x-menu activate-by-route>

                            {{-- User --}}
                            @if($user = auth()->user())
                                <x-list-item :item="$user" sub-value="username" no-separator no-hover class="!-mx-2 mt-2 mb-5 border-y border-y-sky-900">
                                    <x-slot:actions>
                                        <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" />
                                    </x-slot:actions>
                                </x-list-item>
                            @endif

                            <x-menu-item title="Hello" icon="o-sparkles" link="/" />
                            <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                                <x-menu-item title="Wifi" icon="o-wifi" link="####" />
                                <x-menu-item title="Archives" icon="o-archive-box" link="####" />
                            </x-menu-sub>
                        </x-menu>
                    </x-slot:sidebar>

                    {{-- The `$slot` goes here --}}
                    <x-slot:content>
                        {{ $slot }}
                    </x-slot:content>
                </x-main>

                {{--  TOAST area --}}
                <x-toast />
            </body>
        @endverbatim
    </x-code>

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

                        {{-- Brand --}}
                        <div>App</div>
                    </x-slot:brand>

                    {{-- Right side actions --}}
                    <x-slot:actions>
                        <x-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" />
                        <x-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" />
                    </x-slot:actions>
                </x-nav>

                {{-- The main content with `full-width` --}}
                <x-main with-nav full-width>

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
                        {{ $slot }}
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
</div>
