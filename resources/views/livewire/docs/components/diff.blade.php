<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Diff')] class extends Component {
}
?>

<div class="docs">
    <x-header title="Diff" />

    <x-header title="Install" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This component is a wrapper around <a href="https://diff2html.xyz" target="_blank">diff2html</a> with a simpler API to quickly show diff between two strings.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{-- DIFF2HTML --}}
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/styles/github.min.css" />
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html/bundles/css/diff2html.min.css" />
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html/bundles/js/diff2html-ui.min.js"></script>
            </head>
        @endverbatim
    </x-code>

    <x-header title="Examples" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            @php
                $old = '{
                    "age": 24
                    "name": "Mary"
                }';

                $new = '{
                    "age": 27
                    "name": "Mary"
                }';

            @endphp

            {{-- The `file-name` determines highlight language --}}
            <x-diff :old="$old" :new="$new" file-name="extra.json" />
        @endverbatim
    </x-code>
</div>
