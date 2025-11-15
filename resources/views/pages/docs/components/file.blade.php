<?php

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

new
#[Title('File Upload')]
#[Layout('layouts.app', ['description' => 'Livewire file upload component.'])]
class extends Component {
    use Toast, WithFileUploads;

    #[Rule('required|max:10')] // 10Kb
    public $file;

    #[Rule(['photos.*' => 'image|max:100'])] // 100Kb
    #[Rule(['photos' => 'required'])]
    public array $photos = [];

    #[Rule('required|image|max:100')]
    public $photo;

    #[Rule('required|image|max:100')]
    public $photo2;

    public User $user;

    public function mount(): void
    {
        $this->user = User::inRandomOrder()->first();
    }
}; ?>

<div class="docs" xmlns="http://www.w3.org/1999/html">
    <x-anchor title="File Upload" />

    <p>
        This component is powered by Livewire`s <a href="https://livewire.laravel.com/docs/uploads" target="_blank">file upload</a>,
        including all features like file size and type validation.
        Please, <strong>first check Livewire docs</strong> to proper setup file uploads before using this component.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        For multiple image upload see <a href="/docs/components/image-library" wire:navigate>Image Library</a> component.
    </x-alert>

    <x-anchor title="Single file" size="text-xl" class="mt-14" />

    <p>
        Livewire itself triggers real time validation for single file upload.
    </p>

    <x-code-example class="sm:px-64">
        @verbatim('docs')
            @php     // [tl! .docs-hide:2]
                $file = $this->file;
            @endphp
            <x-file wire:model="file" label="Receipt" hint="Only PDF" accept="application/pdf" />
        @endverbatim
    </x-code-example>

    <p>
        You can use validation rule from Laravel.
    </p>

    <x-code-example no-render language="php">
        @verbatim('docs')
            #[Rule('required|max:10')]
            public $file;
        @endverbatim
    </x-code-example>

    <x-anchor title="Multiple files" size="text-xl" class="mt-14" />

    <p>
        Livewire itself <strong>does not</strong> trigger real time validation for multiple file upload, like single file upload.
        So, remember to call <code>$this->validate()</code> before saving the files.
    </p>

    <x-code-example class="sm:px-64">
        @verbatim('docs')
            @php     // [tl! .docs-hide:2]
                $photos = $this->photos;
            @endphp
            <x-file wire:model="photos" label="Documents" multiple />
        @endverbatim
    </x-code-example>

    <p>
        Here is a validation trick for multiple file upload.
    </p>

    <x-code-example no-render language="php">
        @verbatim('docs')
            #[Rule(['photos' => 'required'])]          // A separated rule to make it required
            #[Rule(['photos.*' => 'image|max:100'])]   // Notice `*` syntax for validate each file
            public array $photos = [];
        @endverbatim
    </x-code-example>

    <x-anchor title="Image preview" size="text-xl" class="mt-14" />

    <p>
        It only works for single image.
        For multiple image upload see <a href="/docs/components/image-library" wire:navigate>Image Library</a> component.
    </p>

    <p>
        Use a html <code>img</code> as placeholder with the CSS that works best for you.
        In the following example we use fallback urls to cover scenarios like create or update.
    </p>
    <p>
        <strong>Click</strong> on image to change it.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php     // [tl! .docs-hide:3]
                $photo = $this->photo;
                $user = $this->user;
            @endphp
            <x-file wire:model="photo" accept="image/png, image/jpeg">
                <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
            </x-file>
        @endverbatim
    </x-code-example>

    <x-anchor title="Image Crop" size="text-xl" class="mt-14" />

    <p>
        It only works for single image.
        For multiple image upload see <a href="/docs/components/image-library" wire:navigate>Image Library</a> component.
    </p>

    <p>
        First, add <a href="https://fengyuanchen.github.io/cropperjs/" target="_blank">Cropper.js</a> library.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <head>
                ...
                {{-- Cropper.js --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
            </head>
        @endverbatim
    </x-code-example>

    <p>
        Now you can use the <code>crop-after-change</code> property.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php     // [tl! .docs-hide:3]
                $photo2 = $this->photo2;
                $user = $this->user;
            @endphp
            <x-file wire:model="photo2" accept="image/png" crop-after-change>
                <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
            </x-file>
        @endverbatim
    </x-code-example>

    <p>
        You can set or override any
        <a href="https://fengyuanchen.github.io/cropperjs/" target="_blank">Cropper.js</a> option.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            @php
                $config = ['guides' => false];
            @endphp

            <x-file ... :crop-config="$config">
                ...
            </x-file>
        @endverbatim
    </x-code-example>

    <p>
        Once <strong>Cropper.js</strong> does not offer an easy way to customize its CSS, just inspect browser
        console to hack the CSS that works best for you.
        We are using the following on this page.
    </p>

    {{--@formatter:off--}}
    <x-code-example language="css" no-render>
        @verbatim('docs')
            .cropper-point {
                width: 10px !important;
                height: 10px !important;
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Labels" size="text-xl" class="mt-14" />

    <p>
        Here are all default labels.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            @php     // [tl! .docs-hide:3]
                $photo5 = $this->photo5;
                $user = $this->user;
            @endphp
            <x-file
                ...
                change-text="Change"
                crop-text="Crop"
                crop-title-text="Crop image"
                crop-cancel-text="Cancel"
                crop-save-text="Crop"
            >
                ...
            </x-file>
        @endverbatim
    </x-code-example>
</div>
