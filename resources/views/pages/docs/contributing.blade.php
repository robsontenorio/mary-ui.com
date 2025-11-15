<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Contributing')]
class extends Component {
}
?>
<div class="docs">

    <x-anchor title="Contributing" />

    <p>
        Please, consider adding RTL support when submitting new components.
        See this post <a href="https://tailwindcss.com/blog/tailwindcss-v3-3#simplified-rtl-support-with-logical-properties">Tailwind Simplified RTL support with logical
            properties</a>.
        Here is an example of <a href="https://github.com/robsontenorio/mary/pull/503">refactoring PR</a>.
    </p>

    <x-anchor title="Components" size="text-xl" class="mt-14" />

    <p>
        Clone the repository into some folder <strong>inside your app</strong>.
    </p>

    <x-code-example no-render language="shellscript">
        git clone git@github.com:robsontenorio/mary.git
    </x-code-example>

    <p>
        Change <code>composer.json</code> from <strong>your app</strong>.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="javascript">
        @verbatim('docs')
            "minimum-stability": "dev", // <- change to "dev"  [tl! highlight .animate-bounce]

            // Add this block  [tl! highlight]
            "repositories": {
                "robsontenorio/mary": {
                    "type": "path",
                    "url": "/var/www/html/packages/mary", // <- change the path  [tl! highlight .animate-bounce]
                    "options": {
                        "symlink": true
                    }
                }
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        Require the package again for local symlink.
    </p>

    <x-code-example no-render language="shellscript">
        composer require robsontenorio/mary
    </x-code-example>

    <p>
        Start the dev server.
    </p>

    <x-code-example no-render language="shellscript">
        yarn dev
    </x-code-example>

    <x-anchor title="Docs" size="text-xl" class="mt-14" />

    <p>
        This website is made with Laravel, Livewire and maryUI.
    </p>

    <x-code-example no-render language="shellscript">
        git clone git@github.com:robsontenorio/mary-ui.com.git
    </x-code-example>

    <p>
        Create the <code>.env</code> from <code>.env.example</code>.
    </p>

    <x-code-example no-render language="shellscript">
        cp .env .env.example
    </x-code-example>

    <p>
        Install, migrate and start.
    </p>

    <x-code-example no-render language="shellscript">
        composer start
    </x-code-example>

    <p>
        <x-icon name="o-bolt" class="text-warning" />
        <strong>See <a href="http://localhost:8018">http://localhost:8018</a></strong>
    </p>
</div>
