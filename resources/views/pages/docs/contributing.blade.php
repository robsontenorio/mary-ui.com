<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Contributing')] class extends Component
{
}
?>
<div>
<x-markdown class="markdown">
# Contributing

### Mary components

Clone the repository into some folder **inside your app**.
<x-code no-render language="bash">
git clone git@github.com:robsontenorio/mary.git
</x-code>


Change `composer.json` from **your app**

<x-code no-render language="javascript">
"minimum-stability": "dev",      // <- change to "dev"

// Add this
"repositories": {
    "robsontenorio/mary": {
        "type": "path",
        "url": "/path/to/mary",  // <- change the path
        "options": {
            "symlink": true
        }
    }
}
</x-code>

Require the package again for local symlink.

<x-code no-render language="bash">
composer require robsontenorio/mary
</x-code>

Start dev

<x-code no-render language="bash">
yarn dev
</x-code>

### Mary docs

This website is made with Laravel, Livewire, Volt and Mary.

Clone the repository and open it on VSCODE with `Dev Container` extension.
<x-code no-render language="bash">
git clone git@github.com:robsontenorio/mary-ui.com.git
</x-code>

Create `.env` from `.env.example` and adjust few vars.

<x-code no-render language="bash">
APP_ENV=local
APP_DEBUG=true
</x-code>

Install, migrate and start.

<x-code no-render language="bash">
composer start
</x-code>

<x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />

<strong>Done! See <a href="http://localhost:8018">http://localhost:8018</a></strong>

</x-markdown>

<x-alert icon="o-light-bulb" class="markdown mb-5">
     If you are not using VSCODE Dev Containers, use any local address you have set up.
</x-alert>

<x-alert icon="o-light-bulb" class="markdown">
    It uses SQLITE for dynamic examples.
</x-alert>


</div>
