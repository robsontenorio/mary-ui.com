<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Code')]
#[Layout('layouts.app', ['description' => 'Cool code editor component based on Ace Editor.'])]
class extends Component {
    public string $example1 = '';

    public string $example2 = '';

    public string $example3 = "\x3C\x3Fphp echo \"Hello!\" ;\x3F\x3E";

    public function mount()
    {
        $this->example1 = <<<EOT
            // buggy code
            function hello(name) {
                var = 1
            }
            EOT;

        $this->example2 = <<<EOT
        # .env file
        APP_URL=http://my-app.com
        APP_KEY=mysecretkey
        EOT;
    }
}; ?>

<div class="docs">
    <x-anchor title="Code" />

    <p>
        This component is a wrapper around <a href="https://ace.c9.io" target="_blank">Ace Editor</a>.
        It is intended to be used on simple use cases, so do not expect a full featured code editor.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Why not Monaco Editor? It’s heavier and requires a more complex setup.
    </x-alert>

    <x-anchor title="Setup" size="text-xl" class="mt-14" />

    <x-code-example no-render>
        @verbatim('docs')
            <head>
                ...
                {{-- Ace Editor --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ace.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.39.1/ext-language_tools.min.js"></script>
            </head>
        @endverbatim
    </x-code-example>

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    <p>
        Ace Editor provides built-in support for common languages, including basic autocomplete and linting.
        It also includes a built-in search feature. Click inside the editor and hit
        <x-kbd>Cmd/Ctrl</x-kbd>
        +
        <x-kbd>F</x-kbd>
    </p>

    <x-code-example>
        @verbatim('docs')
            <x-code wire:model="example1" label="Editor" hint="Javascript language." />
        @endverbatim
    </x-code-example>

    <x-anchor title="Settings" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            <x-code
                wire:model="example2"
                language="properties"
                height="150px"
                line-height="3"
                print-margin="true" />
        @endverbatim
    </x-code-example>

    <p>You can find the full list of supported languages and themes on the
        <a href="https://ace.c9.io/build/kitchen-sink.html" target="_blank">
            Ace Editor demo page
        </a>
        . Just inspect the HTML of the dropdown menus to explore the available options.
    </p>

    <x-anchor title="Themes" size="text-xl" class="mt-14" />

    <p>
        This component supports automatic theme switching. Try toggling the theme at the top of this page to see it in action.
    </p>

    <x-code-example>
        @verbatim('docs')
            <x-code
                wire:model="example3"
                dark-theme="cobalt"
                light-theme="dreamweaver"
                language="php"
            />
        @endverbatim
    </x-code-example>
</div>
