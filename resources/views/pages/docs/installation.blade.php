{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown class="markdown">
# Installation

This package <strong>does not ship any custom CSS</strong> and relies on <strong>daisyUI and Tailwind</strong> for out-of-box styling.
Of course you can opt to not install daisyUI, but in this case you need to style **all components by yourself**.

### Requirements

- Laravel 10+
- Livewire 3
- [Tailwind](https://tailwindcss.com/docs/guides/laravel)
- **[daisyUI (recommended)](https://daisyui.com/docs/install/)**
</x-markdown>


<x-markdown>
### Install

Require the package.

<pre>
<x-torchlight-code language='bash'>
    composer require robsontenorio/mary    
</x-torchlight-code>
</pre>

Add a new entry on `tailwind.config.js`.
</x-markdown>

<pre>
<x-torchlight-code language='javascript'>
    export default {
        content: [
            "./resources/**/**/*.blade.php",
            "./resources/**/**/*.js",
            "./app/Livewire/**/**/*.php", 
            // Add this  
            "./vendor/robsontenorio/mary/src/View/Components/**/*.php" // [tl! add] [tl! focus]
        ]
    }
</x-torchlight-code>
</pre>

<x-icon name="o-sparkles" class="text-yellow-500 w-8 h-8" /> 

<strong >You are done!</strong>

<x-alert title="All components are styled out-the-box with daisy UI. So, it is recommend to install it. Otherwise you will need to style all components by your self" class="alert-warning mt-10" icon="o-exclamation-triangle" />


</x-layouts.app>
{{-- blade-formatter-enable --}}
