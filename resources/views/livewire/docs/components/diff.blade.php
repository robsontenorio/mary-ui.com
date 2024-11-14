<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Diff')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI diff text component using diff2html.'])]
class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Diff" />

    <p>
        This component is a wrapper around <a href="https://diff2html.xyz" target="_blank">diff2html</a> with a simpler API to quickly show diff between two strings.
    </p>

    <x-anchor title="Install" size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{--  DIFF2HTML  --}}
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/xcode.min.css" />
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/css/diff2html.min.css" />
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html@3.4.48/bundles/js/diff2html-ui.min.js"></script>
            </head>
        @endverbatim
    </x-code>

    <x-anchor title="Examples" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            @php
                $old = '{"age": 24, "name": "Mary"}';

                $new = '{"age": 27, "name": "Marian"}';
            @endphp

            {{-- The `file-name` determines highlight language --}}
            <x-diff :old="$old" :new="$new" file-name="extra.json" />
        @endverbatim
    </x-code>
</div>
