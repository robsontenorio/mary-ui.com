<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Markdown')]
#[Layout('components.layouts.app', ['description' => 'Livewire markdown editor component.'])]
class extends Component {
    public string $text = "It **automatically** uploads images to **local** or **S3** disks.";

    public string $text2 = "**Custom** settings!";

    public function mount(): void
    {
        if (! auth()->user()) {
            auth()->login(User::inRandomOrder()->first());
            request()->session()->regenerate();
        }
    }
}; ?>

<div class="docs">
    <x-anchor title="Markdown" />

    <p>
        This component is a wrapper around <a href="https://github.com/Ionaru/easy-markdown-editor" target="_blank">EasyMDE</a>.
        It <strong>automatically</strong> uploads images to <strong>local</strong> or <strong>S3</strong> disks.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Also see the <a href="/docs/components/editor" wire:navigate>Rich Text Editor</a> component.
    </x-alert>

    <x-anchor title="Setup" size="text-xl" class="mt-14" />

    <x-code-example no-render>
        @verbatim('docs')
            <head>
                ...
                {{-- Make sure you have this  --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

                {{-- EasyMDE --}}
                <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
                <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
            </head>
        @endverbatim
    </x-code-example>

    <p>
        If you are using the <strong>local disk</strong> remember to run this.
    </p>
    <x-code-example language="bash" no-render>
        @verbatim('docs')
            php artisan storage:link
        @endverbatim
    </x-code-example>

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    <p>
        For security reasons, uploads only works for <strong>authenticated users</strong>.
        On all examples we already have a random user logged in.
    </p>

    <x-code-example>
        @verbatim('docs')
            <x-markdown wire:model="text" label="Blog post" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Upload settings" size="text-xl" class="mt-14" />

    <p>
        By default, this component automatically uploads images to <strong>local public disk</strong> into <strong>"markdown/"</strong> folder.
        You can change it like this.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <x-markdown ... disk="s3" folder="super/cool/images" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Customizing" size="text-xl" class="mt-14" />

    <p>
        You can add or override any setting provided by <strong>EasyMDE</strong>. Check its docs for more.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php
                $config = [
                    'spellChecker' => true,
                    'toolbar' => ['heading', 'bold', 'italic', '|', 'upload-image', 'preview'],
                    'maxHeight' => '200px'
                ];
            @endphp

            <x-markdown wire:model="text2" :config="$config" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Preview style" size="text-xl" class="mt-14" />

    <p>
        Remember that Tailwind get rid of the basic styles of <code>H1, H2, H3</code> ...
        So, you need to put it back on your <code>app.css</code> to make the
        <strong>preview</strong> and <strong>side-by-side</strong> buttons work nice.
    </p>

    <p>
        We have applied these style on this demo. Feel free to change it.
    </p>

    {{--@formatter:off--}}
    <x-code-example language="css" no-render>
        .EasyMDEContainer h1 {
            @apply text-4xl font-bold mb-5
        }

        .EasyMDEContainer h2 {
            @apply text-2xl font-bold mb-3
        }

        .EasyMDEContainer h3 {
            @apply text-lg font-bold mb-3
        }
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Dark mode" size="text-xl" class="mt-14" />

    <p>
        By default, the EasyMDE does not support natively the dark mode. If you want to support dark mode, here is a example. Feel free to change it.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Please, make sure you have configured the dark mode through the <a href="/docs/components/theme-toggle">Theme Toggle</a> component.
    </x-alert>

    {{--@formatter:off--}}
    <x-code-example language="css" no-render>
        @verbatim('docs')
        .EasyMDEContainer .CodeMirror {
            @apply bg-base-100 text-base-content
        }

        .EasyMDEContainer .CodeMirror {
            @apply bg-base-100 text-base-content
        }

        .EasyMDEContainer .CodeMirror-cursor {
            @apply border border-b-base-100
        }

        .EasyMDEContainer .editor-toolbar > button:hover, .EasyMDEContainer .editor-toolbar > .active {
            @apply bg-base-100 text-base-content
        }
        @endverbatim
    </x-code-example>

</div>
