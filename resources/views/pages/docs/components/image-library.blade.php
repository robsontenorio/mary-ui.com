<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;

new
#[Title('Image Library')]
#[Layout('layouts.app', ['description' => 'Livewire ui component for image library management, with multiple upload, crop, sort and preview.'])]
class extends Component {
    use WithFileUploads, WithMediaSync;

    #[Rule(['files.*' => 'image|max:100'])]
    public array $files = [];

    #[Rule('required')]
    public Collection $library;

    public User $user;

    public function mount(): void
    {
        $this->user = User::inRandomOrder()->first();
        $this->library = $this->user->library ?? new Collection();
    }
}; ?>

<div class="docs">
    <x-anchor title="Image Library" />

    <p>
        This component manages <strong>multiple image upload</strong> and is powered by Livewire`s
        <a href="https://livewire.laravel.com/docs/uploads" target="_blank">file upload</a>, including all its features like file validations.
        It also handles <strong>automatic</strong> storage persistence on <strong>local</strong> and <strong>S3</strong> disks.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        For simple use cases, prefer using the <a href="/docs/components/file" wire:navigate>File</a> component.
    </x-alert>

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    {{--@formatter:off--}}
    <x-code-example>
        @verbatim('docs')
            @php     // [tl! .docs-hide:4]
                $files = $this->files;
                $library = $this->library;
                $user = $this->user;
            @endphp
            <x-image-library
                wire:model="files"                 {{-- Temprary files --}}
                wire:library="library"             {{-- Library metadata property --}}
                :preview="$library"                {{-- Preview control --}}
                label="Product images"
                hint="Max 100Kb" />
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Setup" size="text-xl" class="mt-14" />

    <p>
        First, add <a href="https://fengyuanchen.github.io/cropperjs/" target="_blank">Cropper.js</a> and
        <a href="https://sortablejs.github.io/Sortable/" target="_blank">Sortable.js</a>.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <head>
                ...
                {{-- Cropper.js --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />

                {{-- Sortable.js --}}
                <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.1/Sortable.min.js"></script>
            </head>
        @endverbatim
    </x-code-example>

    <p>
        Add a new <code>json</code> column on your migration files to represent the image library metadata.
    </p>

    <x-code-example no-render language="php">
        @verbatim('docs')
            // Users table migration
            $table->json('library')->nullable();
        @endverbatim
    </x-code-example>

    <p>
        Cast that column as <code>AsCollection</code>.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            // User model

            protected $casts = [
                ...
                'library' => AsCollection::class,
            ];
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    <p>
        The following example considers that you named it as <code>library</code> and you are <strong>editing an existing user</strong>.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            use Livewire\WithFileUploads;
            use Mary\Traits\WithMediaSync;
            use Illuminate\Support\Collection;

            class extends Component {
                // Add these Traits
                use WithFileUploads, WithMediaSync;

                // Temporary files
                #[Rule(['files.*' => 'image|max:1024'])]
                public array $files = [];

                // Library metadata (optional validation)
                #[Rule('required')]
                public Collection $library;

                // Editing this user
                public User $user;

                public function mount(): void
                {
                    // Load existing library metadata from your model
                    $this->library = $this->user->library;

                    // Or ... an empty collection if this component creates a user
                    // $this->library = new Collection()
                }

                public function save(): void
                {
                    // Your stuff ...

                    // Sync files and updates library metadata
                    $this->syncMedia($this->user);

                    // Or ... first create the user, if this component creates a user
                    // $user = User::create([...]);
                    // $this->syncMedia($user);
                }
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}
    <x-anchor title="S3 storage" size="text-xl" class="mt-14" />

    <p>
        Make sure to proper configure <strong>CDN CORS</strong> on your S3 provider, by listing your local and production environment addresses.
        Otherwise, cropper won't work.
    </p>

    <x-anchor title="Sync options" size="text-xl" class="mt-14" />

    <p>
        If you are using default variable names described on "Setup" and "Example" topics above, <strong>you are good to go</strong>.
        Otherwise, here are all options for syncing media on storage.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            $this->syncMedia(
                model: $this->user,         // A model that has an image library
                library: 'library',         // The library metadata property on component
                files: 'files',             // Temp files property on component
                storage_subpath: '',        // Sub path on storage. Ex: '/users'
                model_field: 'library',     // The model column that represents the library metadata
                visibility: 'public'        // Visibility on storage
                disk: 'public'              // Storage disk. Also works with 's3'
            );
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Labels" size="text-xl" class="mt-14" />

    <p>
        Here are all default labels.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <x-image-library
                ...
                change-text="Change"
                crop-text="Crop"
                remove-text="Remove"
                crop-title-text="Crop image"
                crop-cancel-text="Cancel"
                crop-save-text="Crop"
                add-files-text="Add images" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Cropper settings" size="text-xl" class="mt-14" />

    <p>
        You can set or override any <a href="https://fengyuanchen.github.io/cropperjs/" target="_blank">Cropper.js</a> option.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            @php
                $config = [ 'guides' => false ];
            @endphp

            <x-image-library ... :crop-config="$config" />
        @endverbatim
    </x-code-example>

    <p>
        Once <strong>Cropper.js</strong> does not offer an easy way to customize its CSS,
        just inspect browser console to hack the CSS that works best for you.
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

</div>
