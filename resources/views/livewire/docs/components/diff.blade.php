<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Diff')] class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Diff" />

    <x-anchor title="Install" size="text-2xl" class="mt-10 mb-5" />

    <p>
        This component is a wrapper around <a href="https://diff2html.xyz" target="_blank">diff2html</a> with a simpler API to quickly show diff between two strings.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{--  DIFF2HTML  --}}
                @maryCSS('diff/github.min.css')
                @maryCSS('diff/diff2html.min.css')
                @maryJS('diff/diff2html-ui.min.js')
            </head>
        @endverbatim
    </x-code>

    <x-anchor title="Examples" size="text-2xl" class="mt-10 mb-5" />

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
