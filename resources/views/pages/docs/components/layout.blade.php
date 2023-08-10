{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Layout

You are free to make your own layout decision. But here is suggestion to quickly get started.

You can play around by placing css classes on components or slots, or your just removing some entirely.

<pre>
<x-torchlight-code language='html'>
    @verbatim
    <body class="min-h-screen font-sans antialiased">
        <x-nav sticky>
            <x-slot:brand>
                My App
            </x-slot:brand>
            <x-slot:actions>
                <a href="###"><x-icon name="o-envelope" /> Messages</a>
                <a href="###"><x-icon name="o-bell" /> Notifications</a>
            </x-slot:actions>
        </x-nav>
        <x-main>
            <x-slot:sidebar class="bg-slate-200">
                <x-menu>
                    <x-menu-item title="Home" icon="o-home" link="###" />
                    <x-menu-item title="Messages" icon="o-envelope" link="###" />
                </x-menu>
            </x-slot:sidebar>
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
            <x-slot:footer>
                <hr />
                <div class="p-6">
                    Footer
                </div>
            </x-slot:footer>
        </x-main>
    </body>
    @endverbatim
</x-torchlight-code>
</pre>
</x-markdown>

</x-layouts.app>
{{-- blade-formatter-enable --}}
