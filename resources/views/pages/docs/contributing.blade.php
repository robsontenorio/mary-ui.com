<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Contributing')] class extends Component {
}
?>
<div class="docs">

    <x-header title="Contributing" with-anchor />

    <x-header title="Mary components" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        Clone the repository into some folder <strong>inside your app</strong>.
    </p>

    <x-code no-render language="bash">
        git clone git@github.com:robsontenorio/mary.git
    </x-code>

    <p>
        Change <code>composer.json</code> from <strong>your app</strong>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="javascript">
        "minimum-stability": "dev", // <- change to "dev"  [tl! highlight .animate-bounce]

        // Add this block  [tl! highlight]
        "repositories": {
            "robsontenorio/mary": {
                "type": "path",
                "url": "/path/to/mary", // <- change the path  [tl! highlight .animate-bounce]
                "options": {
                    "symlink": true
                }
            }
        }
    </x-code>
    {{--@formatter:on--}}

    <p>
        Require the package again for local symlink.
    </p>

    <x-code no-render language="bash">
        composer require robsontenorio/mary
    </x-code>

    <p>
        Start dev
    </p>

    <x-code no-render language="bash">
        yarn dev
    </x-code>

    <x-header title="Mary docs" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        This website is made with Laravel, Livewire, Volt and Mary.
    </p>

    <p>
        Clone the repository and open it on VSCODE with the <code>Dev Container</code> extension.
    </p>

    <x-code no-render language="bash">
        git clone git@github.com:robsontenorio/mary-ui.com.git
    </x-code>

    <p>
        Create <code>.env</code> from <code>.env.example</code> and adjust a few vars.
    </p>

    <x-code no-render language="bash">
        APP_ENV=local
        APP_DEBUG=true
    </x-code>

    <p>
        Install, migrate and start.
    </p>

    <x-code no-render language="bash">
        composer start
    </x-code>

    <p>
        <x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />
        <strong>Done! See <a href="http://localhost:8018">http://localhost:8018</a></strong>
    </p>

    <x-alert icon="o-light-bulb" class="mb-8">
        If you are not using the VSCODE Dev Containers extension, use any local address you have set up.
    </x-alert>

    <x-alert icon="o-light-bulb">
        It uses SQLITE for dynamic examples.
    </x-alert>

</div>
