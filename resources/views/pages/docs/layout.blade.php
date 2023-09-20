<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Layout')] class extends Component
{
}
?>
<div>
<x-markdown>
# Layout

You are free to make your own layout decision. But, here is suggestion to quickly get started.

You can play around by placing **daisyUI/Tailwind** classes on components or slots, from this example. Also try to remove entirely some components or slots.

Default Livewire app template is `views/components/layouts/app.blade.php`
</x-markdown>

<x-markdown class="markdown">
### All together

- Navbar
- Sidebar
- Footer
</x-markdown>

<x-code no-render>
@verbatim
...

<head>
    ...

    <!-- Remember adding this -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased">

    <!-- The navbar with `sticky` and `full-width` -->
    <x-nav sticky full-width>
        
        <x-slot:brand>
            <!-- Drawer toggle for "main-drawer" -->
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>

            <!-- Your logo -->
            My App
        </x-slot:brand>

        <!-- Right side actions -->
        <x-slot:actions>
            <a href="###"><x-icon name="o-envelope" /> Messages</a>
            <a href="###"><x-icon name="o-bell" /> Notifications</a>
        </x-slot:actions>
    </x-nav>

    <!-- The main content with `full-width` -->
    <x-main full-width>

        <!-- It is a sidebar that works also as a drawer at small screens -->
        <!-- Note `main-drawer` reference here -->
        <x-slot:sidebar drawer="main-drawer" class="bg-slate-200">

            <!-- Activate menu item when route matches `link` property -->
            <x-menu activate-by-route>
                <x-menu-item title="Home" icon="o-home" link="###" />
                <x-menu-item title="Messages" icon="o-envelope" link="###" />
            </x-menu>
        </x-slot:sidebar>

        <!-- The `$slot` goes here -->
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>

        <!-- Footer area -->
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

<x-markdown>
### Only sidebar

This layout  has only a collapsibe Sidebar. Fits nice for "enterprise layout" which need more vertical spacing.

</x-markdown>

<x-code no-render>
@verbatim
...

<head>
    ...

    <!-- Remember adding this -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased">
    <x-main full-width>
        <x-slot:sidebar drawer="main-drawer" collapsible class="pt-3 bg-sky-800 text-white">
        
            <!-- Hidden when collapsed -->
            <div class="hidden-when-collapsed ml-5 font-black text-4xl text-yellow-500">mary</div>
            
            <!-- Display when collapsed -->
            <div class="display-when-collapsed ml-5 font-black text-4xl text-orange-500">m</div>
            
            <!-- Custom `active menu item background color` -->
            <x-menu activate-by-route active-bg-color="bg-base-300/10">        

                <!-- User -->
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
                    <x-menu-item title="Archives" icon="o-archive-box"  />
                </x-menu-sub>
            </x-menu>
        </x-slot:sidebar>
        
        <!-- The `$slot` goes here -->
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
</body>
@endverbatim
</x-code>

</div>