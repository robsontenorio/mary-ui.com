<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

new
#[Title('Image Library')]
#[Layout('components.layouts.app', ['description' => 'Livewire ui component for image library management, with multiple upload, crop, sort and preview.'])]
class extends Component {
    use WithFileUploads, WithMediaSync, Toast;

    #[Rule(['files.*' => 'image|max:100'])]
    public array $files = [];

    #[Rule('required')]
    public Collection $library;

    public User $user;

    public function mount(): void
    {
        $this->user = User::find(2);
        $this->library = $this->user->library;
    }

    public function save(): void
    {
        $this->validate();
        $this->syncMedia($this->user, $this->files, $this->library);
        //$this->success('It is ok, but we will not store files here');
    }
}; ?>

<div class="docs">
    <x-anchor title="Image Library" />

    <p>
        This component manages <strong>multiple image upload</strong> and is powered by Livewire`s
        <a href="https://livewire.laravel.com/docs/uploads" target="_blank">file upload</a>, including all features like file size/type validation
        and <strong>automatic</strong> storage persistence.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need simple file upload or need to handle only one image see <a href="/docs/components/file" wire:navigate>File</a> component.
    </x-alert>

    <x-anchor title="Example" size="text-2xl" class="mt-10 mb-5" />

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php                            // [tl! .docs-hide]
                $files = $this->files;      // [tl! .docs-hide]
                $library = $this->library;    // [tl! .docs-hide]
                $user = $this->user;        // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            <x-image-library
                wire:model="files"                 {{-- Temprary files --}}
                wire:media="library"               {{-- Library metadata property --}}
                :preview="$library"                {{-- Preview control --}}
                label="Product images"
                hint="Image files only" />
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Setup" size="text-2xl" class="mt-10 mb-5" />

    <p>
        First, add <a href="https://fengyuanchen.github.io/cropperjs/" target="_blank">Cropper.js</a> and
        <a href="https://sortablejs.github.io/Sortable/" target="_blank">Sortable.js</a>.
    </p>

    <x-code no-render>
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
    </x-code>

    <p>
        Now, add a new <code>json</code> column on your migration files to represent the image library metadata.
    </p>

    <x-code no-render language="php">
        // Users table migration
        $table->json('library')->nullable();
    </x-code>

    <p>
        Cast that column as <code>AsCollection</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        // User model
        protected $casts = [
            ...
            'library' => AsCollection::class,
        ];
    </x-code>
    {{--@formatter:on--}}

    <p>
        The following example considers that you named it as <code>library</code> and you are <strong>editing an existing user</strong>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
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
                    // Remember to validate
                    $this->validate();

                    // Upload to storage and updates library metadata
                    $this->syncMedia($this->user, $this->files, $this->library);

                    // Or ... first create the user, if this components creates a user
                    // $user = User::create([...]);
                    // $this->syncMedia($user, $this->files, $this->library);

                    // Your stuff ...
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Note about validation" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Livewire itself <strong>does not</strong> trigger real time validation for multiple file upload, like single file upload.
        So, remember to call <code>$this->validate()</code> before saving the files.
    </p>

    <x-anchor title="Cropper settings" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can set or override any <a href="https://fengyuanchen.github.io/cropperjs/" target="_blank">Cropper.js</a> option.
    </p>

    <x-code no-render>
        @verbatim('docs')
            @php
                $config = [ 'guides' => false ];
            @endphp

            <x-image-library ... :crop-config="$config" />
        @endverbatim
    </x-code>

    <br>
    <p>
        Once <strong>Cropper.js</strong> does not offer an easy way to customize its CSS, just inspecting browser console to hack the CSS that works best for you.
        We are using the following on all examples on this page.
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

</div>
