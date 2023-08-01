{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Layout

You are free to make your own layout decision. This is just a suggestion to quickly get started.

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
                Main Content 
            </<x-slot:content>
        </x-main>
    </body>    
    @endverbatim
</x-torchlight-code>
</pre>

### Common css

Place this on `resouces/css/app.css`

<pre>
<x-torchlight-code language='css'>
@tailwind base;
@tailwind components;
@tailwind utilities;

h1,
h2,
h3,
h4,
h5 {
    @apply font-bold my-10
}

h1 {
    @apply text-4xl font-extrabold mt-0
}

h2 {
    @apply text-3xl
}

h3 {
    @apply text-2xl my-5
}

h4 {
    @apply text-xl
}

p {
    @apply my-5
}

a {
    @apply link
}

ul li {
    @apply ml-10 list-disc
}

ol li {
    @apply ml-10 list-decimal
}
</x-torchlight-code>
</pre>

</x-markdown>

</x-layouts.app>
{{-- blade-formatter-enable --}}
