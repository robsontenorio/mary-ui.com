{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown class="markdown">
# Installation

This package <strong>does not ship any custom CSS</strong> and relies on <strong>daisyUI and Tailwind</strong> for out-of-box styling.
Of course you can opt to not install daisyUI, but in this case you need to style **all components by yourself**.

### Install dependencies


<pre>
<x-torchlight-code language='bash'>
# Livewire 3
composer require livewire/livewire "^3.0@beta"

# Tailwind and daisyUI
yarn install -D tailwindcss daisyui@latest postcss autoprefixer && npx tailwindcss init -p
</x-torchlight-code>
</pre>

### Install mary

<pre>
<x-torchlight-code language='bash'>
    composer require robsontenorio/mary    
</x-torchlight-code>
</pre>

Then, add **mary** and **daisy** entries to `tailwind.config.js`.

<pre>
<x-torchlight-code language='javascript'>
export default {
    content: [
        // You will probably also need those lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",                     

        "./vendor/robsontenorio/mary/src/View/Components/**/*.php" //[tl! add]
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")] //[tl! add]
}
</x-torchlight-code>
</pre>


<x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" /> 

<strong >... You are done!</strong>

</x-markdown>
</x-layouts.app>
{{-- blade-formatter-enable --}}
