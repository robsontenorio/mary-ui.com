<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Rich Text Editor')]
#[Layout('components.layouts.app', ['description' => 'Livewire ui rich text html editor component.'])]
class extends Component {
    #[Rule('required|min:20')]
    public string $text = '<p><b>Select me</b> to create a link and upload any file, like PDF.</p><p>Also try the <i>image button</i>.</p>';

    public string $text2 = 'Hit enter to see it autogrow until the max height.';

    public function mount(): void
    {
        auth()->login(User::inRandomOrder()->first());
        request()->session()->regenerate();
    }
}; ?>

<div class="docs">
    <x-anchor title="Rich Text Editor" />
    <p>
        This component is a wrapper around <a href="https://www.tiny.cloud" target="_blank">TinyMCE</a>.
        It <strong>automatically</strong> uploads images and files to <strong>local</strong> or <strong>S3</strong> disks.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need a native textarea see the <a href="/docs/components/textarea" wire:navigate>Textarea</a> component.
    </x-alert>

    <x-anchor title="Setup" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Create an account on TinyMCE site and replace <code>YOUR-KEY-HERE</code> on url bellow.
        If you don't want to rely on cloud setup, just download TinyMCE SDK and self-host the source code.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...
                {{-- Make sure you have this, to make file upload secure --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                
                {{-- TinyMCE --}}
                <script src="https://cdn.tiny.cloud/1/YOUR-KEY-HERE/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            </head>
        @endverbatim
    </x-code>

    <x-anchor title="Example" size="text-2xl" class="mt-10 mb-5" />

    <p>
        For security reasons, images and files uploads only works for <strong>authenticated users</strong>.
        On all examples we already have a random user logged in.
    </p>

    <x-code>
        @verbatim('docs')
            @php                        // [tl! .docs-hide]
                $text = $this->text;    // [tl! .docs-hide]
            @endphp                     {{-- [tl! .docs-hide] --}}
            <x-editor wire:model="text" label="Description" hint="The full product description" disk="s3" folder="juju/mica" />
        @endverbatim
    </x-code>

    <x-anchor title="Upload settings" size="text-2xl" class="mt-10 mb-5" />

    <p>
        By default, this component automatically uploads images and files to <strong>local public disk</strong> into <strong>"editor/"</strong> folder.
        You can change it like this.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-editor ... disk="s3" folder="super/cool/images" />
        @endverbatim
    </x-code>

    <x-anchor title="Customizing" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can add or override any setting provided by <strong>TinyMCE</strong>. Check its docs for more.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $config = [
                    'plugins' => 'autoresize',
                    'min_height' => 150,
                    'max_height' => 250,
                    'statusbar' => false,
                    'toolbar' => 'undo redo | quickimage quicktable',
                    'quickbars_selection_toolbar' => 'bold italic link',
                ];
            @endphp

            <x-editor wire:model="text2" :config="$config" />
        @endverbatim
    </x-code>
</div>
