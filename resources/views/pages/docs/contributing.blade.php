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
        Clone the repository into your project root.
    </p>

    <x-code-example no-render language="shellscript">
        git clone git@github.com:robsontenorio/mary.git packages/mary
    </x-code-example>

    <p>
        Add the local repository to composer config.
    </p>

    <x-code-example no-render language="shellscript">
        composer config repositories.local '{"type": "path", "url": "packages/mary"}'
    </x-code-example>

    <p>
        Require the package again for local symlink.
    </p>

    <x-code-example no-render language="shellscript">
        composer require robsontenorio/mary:@dev
    </x-code-example>

    <p>
        Start the dev server.
    </p>

    <x-code-example no-render language="shellscript">
        yarn dev
    </x-code-example>

    <p>
        You can roll back to the stable version by removing the local repository and requiring the package again.
    </p>

    <x-code-example no-render language="shellscript">
        @verbatim('docs')
            composer config --unset repositories.local

            composer require robsontenorio/mary
        @endverbatim
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
