{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown class="markdown">
# Installation

This package <strong>does not ship any custom CSS</strong> and relies on <strong>daisyUI and Tailwind</strong> for out-of-box styling.
You can customize most of components styles, by inline overriding daisyUI and Tailwind css classes.
</x-markdown>

<x-alert icon="o-light-bulb" class="markdown">
    Please, for further style references see <a href="https://daisyui.com" target="_blank">daisyUI</a> and <a href="https://tailwindcss.com" target="_blank">Tailwind</a>.
</x-alert>

<x-markdown>
### Install dependencies


<x-code no-render language="bash">
# Livewire 3
composer require livewire/livewire "^3.0@beta"

# Tailwind and daisyUI
yarn install -D tailwindcss daisyui@latest postcss autoprefixer && npx tailwindcss init -p
</x-code>

### Install mary

<x-code no-render language="bash">
composer require robsontenorio/mary    
</x-code>

Then, add **mary** and **daisy** entries to `tailwind.config.js`.

<x-code no-render language="javascript">
export default {
    content: [
        // You will probably also need those lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",                     

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php" 
    ],
    theme: {
        extend: {},
    },
    
    // Add daisyUI
    plugins: [require("daisyui")] 
}
</x-code>


<x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" /> 

<strong >... You are done!</strong>

</x-markdown>
</x-layouts.app>
{{-- blade-formatter-enable --}}
