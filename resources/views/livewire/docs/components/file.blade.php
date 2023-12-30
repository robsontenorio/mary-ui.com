<?php

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

new
#[Title('File Upload')]
#[Layout('components.layouts.app', ['description' => 'Livewire file upload component.'])]
class extends Component {
    use Toast, WithFileUploads;

    #[Rule('max:10')] // 10Kb
    public $photo;

    #[Rule('sometimes|nullable|image|max:1024')]
    public $photo2;

    #[Rule('sometimes|nullable|image|max:1024')]
    public $photo3;

    #[Rule('sometimes|nullable|image|max:1024')]
    public $photo4;

    #[Rule('sometimes|nullable|image|max:1024')]
    public $photo5;

    #[Rule('sometimes|nullable|image|max:1024')]
    public $photo6;

    public User $user;

    public function mount(): void
    {
        $this->user = User::first();
    }

    public function save()
    {
        $this->validateOnly('photo');
    }

    public function save2()
    {
        try {
            $this->validateOnly('photo2');
        } catch (ValidationException $e) {
            $this->error($e->getMessage());
        }
    }

    public function save3()
    {
        $this->validateOnly('photo3');
    }
}; ?>

<div class="docs" xmlns="http://www.w3.org/1999/html">
    <x-anchor title="File Upload" />

    <p>
        This component uses native "file" input and is powered by Livewire`s <a href="https://livewire.laravel.com/docs/uploads" target="_blank">file upload.</a>
        Please, <strong>first check its docs</strong> to proper setup file uploads before using this component.
    </p>

    <p>
        In order to see the <strong>progress indicators on localhost</strong>
        enable <code>Fast 3G</code> on Developer Tools. <strong>Remember to switch it back!</strong>
    </p>

    <x-anchor title="Basic" size="text-2xl" class="mt-10 mb-5" />

    <p>This is the preferred approach to upload documents like PDF.</p>

    <x-code>
        @verbatim('docs')
            @php                            // [tl! .docs-hide]
                $photo = $this->photo;      // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            <x-file wire:model="photo" label="Document" hint="Only PDF" accept="application/pdf" />
        @endverbatim
    </x-code>

    <x-anchor title="Preview" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Place a html <code>img</code> that act as a placeholder with the CSS that works best for you.
        In the following example we use fallback urls to cover scenarios like create or update.
    </p>
    <p>
        <strong>Click</strong> on image to change it.
    </p>

    <x-code>
        @verbatim('docs')
            @php                            // [tl! .docs-hide]
                $photo2 = $this->photo2;      // [tl! .docs-hide]
                $user = $this->user;        // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            {{-- It works only for images --}}
            <x-file wire:model="photo2" accept="image/png, image/jpeg">
                <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
            </x-file>
        @endverbatim
    </x-code>

    <x-anchor title="Crop" size="text-2xl" class="mt-10 mb-5" />

    <p>
        To be able to crop images add <a href="https://fengyuanchen.github.io/cropperjs/" target="_blank">Cropper.js</a>.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...
                {{-- Cropper.js --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
            </head>
        @endverbatim
    </x-code>

    <br>
    <p>
        For cropping immediately after changing an image use <code>crop-after-change</code>.
    </p>

    <x-code>
        @verbatim('docs')
            @php                            // [tl! .docs-hide]
                $photo3 = $this->photo3;      // [tl! .docs-hide]
                $user = $this->user;        // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            {{-- Notice `crop-after-change`--}}
            <x-file wire:model="photo3" crop-after-change>
                <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
            </x-file>
        @endverbatim
    </x-code>

    <br>
    <p>
        You can set or override any <strong>Cropper.js</strong> option.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $config = [
                    'guides' => false
                ];
                $photo4 = $this->photo4;      // [tl! .docs-hide]
                $user = $this->user;        // [tl! .docs-hide]
            @endphp

            {{-- Notice `crop-config`--}}
            <x-file wire:model="photo4" crop-after-change :crop-config="$config">
                <img src="/empty-user.jpg" class="h-40 w-40 rounded-full border-2" />
            </x-file>
        @endverbatim
    </x-code>

    <br>
    <p>
        If you want change cropper appearance, just hack CSS by inspecting browser console. Where are using the following on this website.
    </p>

    {{--@formatter:off--}}
    <x-code language="css" no-render>
        @verbatim('docs')
            .cropper-point {
                width: 10px !important;
                height: 10px !important;
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Buttons and texts" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can display buttons as describe bellow. All buttons have default tooltip texts, so you do not need explicitly to set the text.
    </p>

    <x-code>
        @verbatim('docs')
            @php                            // [tl! .docs-hide]
                $photo5 = $this->photo5;      // [tl! .docs-hide]
                $user = $this->user;        // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            <x-file
                wire:model="photo5"
                change-button
                crop-button
                revert-button
                crop-after-change
                change-text="Edit it"
                revert-text="Revert it"
                crop-text="Crop it"
                crop-title-text="Crop the image"
                crop-cancel-text="Exit"
                crop-save-text="Done"
            >
                <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
            </x-file>
        @endverbatim
    </x-code>
</div>
