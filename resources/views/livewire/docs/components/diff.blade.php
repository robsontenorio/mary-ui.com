<div>
<x-markdown class="markdown">
# Diff

This component is a wrapper around [diff2html](https://diff2html.xyz) with a simpler API to quickly show diff between two strings.

### Install

<x-code no-render>
<head>
    ...
    <!-- DIFF2HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.1/styles/github.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/diff2html/bundles/css/diff2html.min.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/diff2html/bundles/js/diff2html-ui.min.js"></script>
</head>
</x-code>

### Examples
</x-markdown>

<x-code>
@verbatim
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

<!-- The `file-name` determines highlight language -->
<x-diff :old="$old" :new="$new" file-name="extra.json" />

@endverbatim
</x-code>
</div>