<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Layout')] class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Layout" />

    <p>
        You can play around with <strong>daisyUI/Tailwind</strong> classes on the following examples.
        The default Livewire app template lives in <code>views/components/layouts/app.blade.php</code>.
    </p>

    <x-anchor title="Only sidebar" size="text-xl" class="mt-14" />

    <p>
        This layout has only a collapsible sidebar and <b>it is already on your project</b>.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            ...

            <head>
                ...

                {{-- Add this [tl! highlight:1 .animate-bounce] --}}
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>

            <body class="min-h-screen font-sans antialiased bg-base-200">

                {{-- NAVBAR mobile only --}}
                <x-nav sticky class="lg:hidden">
                    <x-slot:brand>
                        <div class="ml-5 pt-5">App</div>
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
                        <div class="ml-5 pt-5">App</div>

                        {{-- MENU --}}
                        <x-menu activate-by-route>

                            {{-- User --}}
                            @if($user = auth()->user())
                                <x-menu-separator />

                                <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                                    <x-slot:actions>
                                        <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                                    </x-slot:actions>
                                </x-list-item>

                                <x-menu-separator />
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

                {{-- Toast --}}
                <x-toast />
            </body>
        @endverbatim
    </x-code-example>

    <x-anchor title="With Navbar" size="text-xl" class="mt-14" />

    <x-code-example no-render>
        @verbatim('docs')
            ...

            <head>
                ...

                {{-- Add this [tl! highlight:1 .animate-bounce] --}}
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>

            <body class="font-sans antialiased">

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
                        <x-button label="Messages" icon="o-envelope" link="###" class="btn-ghost btn-sm" responsive />
                        <x-button label="Notifications" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive />
                    </x-slot:actions>
                </x-nav>

                {{-- The main content with `full-width` --}}
                <x-main with-nav full-width>

                    {{-- This is a sidebar that works also as a drawer on small screens --}}
                    {{-- Notice the `main-drawer` reference here --}}
                    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">

                        {{-- User --}}
                        @if($user = auth()->user())
                            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
                                <x-slot:actions>
                                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate link="/logout" />
                                </x-slot:actions>
                            </x-list-item>

                            <x-menu-separator />
                        @endif

                        {{-- Activates the menu item when a route matches the `link` property --}}
                        <x-menu activate-by-route>
                            <x-menu-item title="Home" icon="o-home" link="###" />
                            <x-menu-item title="Messages" icon="o-envelope" link="###" />
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
    </x-code-example>
</div>
