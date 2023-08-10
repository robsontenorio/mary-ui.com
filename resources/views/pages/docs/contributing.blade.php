{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown class="markdown">
# Contributing

- Repository `git clone git@github.com:robsontenorio/mary.git`
-  Clone the repositoy into some folder **inside your app**. 
- Change `composer.json` from **your app**


<pre>
<x-torchlight-code language='json'>
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
</x-torchlight-code>
</pre>

- Require the package again for local symlink.

<pre>
<x-torchlight-code language='bash'>
composer require robsontenorio/mary
</x-torchlight-code>
</pre>

- Start dev  

<pre>
<x-torchlight-code language='bash'>
yarn dev
</x-torchlight-code>
</pre>
</x-markdown>

</x-layouts.app>
{{-- blade-formatter-enable --}}
