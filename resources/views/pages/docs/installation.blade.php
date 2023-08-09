{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown class="markdown">
# Installation

This package <strong>does not ship any custom CSS</strong> and relies on <strong>daisyUI and Tailwind</strong> for out-of-box styling.
Of course you can opt to not install daisyUI, but in this case you need to style **all components by yourself**.

**Install Livewire**

<pre>
<x-torchlight-code language='bash'>
composer require livewire/livewire "^3.0@beta"
</x-torchlight-code>
</pre>

**Install Tailwind and daisyUI**

<pre>
<x-torchlight-code language='bash'>
yarn install -D tailwindcss daisyui@latest postcss autoprefixer && npx tailwindcss init -p
</x-torchlight-code>
</pre>

**Install mary**

<pre>
<x-torchlight-code language='bash'>
    composer require robsontenorio/mary    
</x-torchlight-code>
</pre>

Add **mary** and **daisy** entries to `tailwind.config.js`.

<pre>
<x-torchlight-code language='javascript'>
export default {
    content: [
        // You will probably need those lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",                     
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php" //[tl! highlight]
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")] //[tl! highlight]
}
</x-torchlight-code>
</pre>

</x-markdown>

<x-icon name="o-sparkles" class="text-yellow-500 w-8 h-8" /> 

<strong >You are done!</strong>

<x-alert title="All components are styled out-the-box with daisy UI. So, it is recommend to install it. Otherwise you will need to style all components by your self" class="alert-warning mt-10" icon="o-exclamation-triangle" />

</x-layouts.app>
{{-- blade-formatter-enable --}}
