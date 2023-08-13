{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown class="markdown">
# Contributing

- Repository `git clone git@github.com:robsontenorio/mary.git`
-  Clone the repositoy into some folder **inside your app**. 
- Change `composer.json` from **your app**


<x-code no-render language="javascript">
"minimum-stability": "dev",      // <- change to "dev" [tl! highlight]
"repositories": {
    "robsontenorio/mary": {
        "type": "path",
        "url": "/path/to/mary",  // <- change the path [tl! highlight]
        "options": {
            "symlink": true
        }
    }
}
</x-code>

- Require the package again for local symlink.

<x-code no-render language="bash">
composer require robsontenorio/mary
</x-code>

- Start dev  

<x-code no-render language="bash">
yarn dev
</x-code>

</x-markdown>

</x-layouts.app>
{{-- blade-formatter-enable --}}
