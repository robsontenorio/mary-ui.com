<?php

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

    #[Rule('required|min:10')]
    public $username;

    #[Rule('image|max:10')] // 10Kb
    public $photo;

    #[Rule('image|max:10')] // 10Kb
    public $photo2;

    #[Rule('image')]
    public $photo3;

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
        This component is powered by Livewire`s <a href="https://livewire.laravel.com/docs/uploads" target="_blank">file upload.</a>
        Please, <strong>first check its docs</strong> to proper setup file uploads before using this component.
    </p>

    <p>
        By default, this component includes:
    </p>

    <ul>
        <li>Progress indicator.</li>
        <li>Validation message.</li>
    </ul>

    <p>
        In order to see the <strong>progress indicators on localhost</strong>
        enable <code>Fast 3G</code> on Developer Tools. <strong>Remember to switch it back!</strong>
    </p>

    <x-anchor title="Basic" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            @php                            // [tl! .docs-hide]
                $photo = $this->photo;      // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            <x-form wire:submit="save">
                <x-file wire:model="photo" label="Picture" hint="Hi!" accept="image/png, image/jpeg" />

                <x-slot:actions>
                    <x-button label="Save" type="submit" class="btn-primary" spinner="save" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    <x-anchor title="Default slot" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can override the file input's default button by using the custom slot.
    </p>

    <x-code>
        @verbatim('docs')
            @php                            // [tl! .docs-hide]
                $photo2 = $this->photo2;      // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            {{-- Alternative loading. Notice the `wire:loading` + `wire:target` combination  --}}
            <span wire:loading wire:target="photo2" class="loading loading-spinner"></span>

            {{-- Image preview --}}
            <img src="{{ $photo2?->temporaryUrl() ?? '/empty-user.jpg' }}" class="h-16 mb-5" />

            <x-form wire:submit="save2">

                {{-- Use `hide-errors` to hide inline validation erros --}}
                {{-- Use `hide-progress` to hide default progress indicator --}}
                <x-file wire:model="photo2" accept="image/png, image/jpeg" hide-errors hide-progress>
                    Click here to edit
                </x-file>

                <x-slot:actions>
                    <x-button label="Save" type="submit" class="btn-primary" spinner="save2" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>

    <x-anchor title="Custom progress" size="text-2xl" class="mt-10 mb-5" />

    <p>
        If for some reason you want to manage the upload progress use the following dispatched events by
        <a href="https://livewire.laravel.com/docs/uploads#progress-indicators" target="_blank">Livewire upload events</a>.
    </p>

    <x-code>
        @verbatim('docs')
            <p>
                Keep console output open while uploading.
            </p>
            <x-form wire:submit="save3">

                {{-- Use `hide-progress` to hide progress bar --}}
                <x-file
                    wire:model="photo3"
                    hide-progress
                    accept="image/png, image/jpeg"
                    @livewire-upload-start="console.log('started photo3', $event.detail)"
                    @livewire-upload-progress="console.log('progress photo3', $event.detail)"
                    @livewire-upload-finish="console.log('Finish photo3')"
                    @livewire-upload-error="console.log('error photo3')"
                />

                <x-slot:actions>
                    <x-button label="Upload" type="submit" class="btn-primary" spinner="save3" />
                </x-slot:actions>
            </x-form>
        @endverbatim
    </x-code>
</div>
