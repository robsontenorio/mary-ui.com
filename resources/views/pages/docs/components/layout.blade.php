{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Layout

You are free to make your own layout decision. This is just a suggestion to quickly get started.

### Template

<pre>
<x-torchlight-code language='html'>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>My Site</title>

            @ vite(['resources/css/app.css', 'resources/js/app.js'])

        </head>
        <body class="bg-base-100 min-h-screen pb-40 font-sans antialiased"> <!-- [tl! focus:17 highlight:17] -->
            <X-nav sticky> 
                <X-slot:brand>
                    My Site
                </X-slot:brand>
                <X-slot:actions>
                    <X-button label="Like" icon="o-heart" />
                </X-slot:actions>
            </X-nav>
            <X-main>
                <X-slot:sidebar>
                    Menu items
                </X-slot:sidebar>
                <X-slot:content>
                    Main Content 
                </<X-slot:content>
            </X-main>
        </body>
    </html>
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
