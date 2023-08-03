{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Layout

You are free to make your own layout decision. But here is suggestion to quickly get started.

### Template


<pre>
<x-torchlight-code language='html'>
    @verbatim
    <body class="bg-base-100 min-h-screen pb-40 font-sans antialiased">
        <x-nav sticky> 
            <x-slot:brand>
                My Site
            </x-slot:brand>
            <x-slot:actions>
                <x-button label="Like" icon="o-heart" />
            </x-slot:actions>
        </x-nav>
        <x-main>
            <x-slot:sidebar>
                Menu items
            </x-slot:sidebar>
            <x-slot:content>
                Content 
            </x-slot:content>
            <x-slot:footer>
                Footer
            </<x-slot:footer>
        </x-main>
    </body>    
    @endverbatim
</x-torchlight-code>
</pre>
</x-markdown>

</x-layouts.app>
{{-- blade-formatter-enable --}}
