<?php

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

new #[Title('Customizing')]
class extends Component {
    #[Validate('required')]
    public int $user_id = 1;

    #[Validate('required')]
    public ?string $name = null;

    #[Validate('required')]
    public ?int $country_id = null;

    public function save()
    {
        $this->validate();
    }

    public function users()
    {
        return User::take(3)->get();
    }

    public function with(): array
    {
        return [
            'users' => $this->users()
        ];
    }
}; ?>

<div class="docs">
    <x-anchor title="Customizing" />

    <p>
        <strong>Any configuration or CSS</strong> provided by <strong>daisyUI or Tailwind</strong> are valid for maryUI components.
        Here are some useful links:
    </p>

    <div class="grid gap-3 justify-items-start">
        <x-button label="Customize" link="https://daisyui.com/docs/customize" class="btn-ghost !no-underline" icon="o-link" external />

        <x-button label="Config" link="https://daisyui.com/docs/config" class="btn-ghost !no-underline" icon="o-link" external />

        <x-button label="Colors" link="https://daisyui.com/docs/colors" class="btn-ghost !no-underline" icon="o-link" external />

        <x-button label="Utilities and variables" link="https://daisyui.com/docs/utilities" class="btn-ghost !no-underline" icon="o-link" external badge="new"
                  badge-classes="badge-warning badge-xs !no-underline" />

        <x-button label="Themes" link="https://daisyui.com/docs/themes" class="btn-ghost !no-underline" icon="o-link" external />

        <x-button label="Theme generator" link="https://daisyui.com/theme-generator" class="btn-ghost !no-underline" icon="o-link" external badge="new"
                  badge-classes="badge-warning badge-xs !no-underline" />
    </div>

    <x-alert icon="o-light-bulb" class="my-10">
        <b>Pro tip:</b> stick to the defaults, avoid to tweak things. DaisyUI themes are carefully hand crafted with all UX/UI things in mind.
    </x-alert>

    <x-anchor title="Theme variables" size="text-xl" class="mt-14 !mb-5" />

    <p>
        This is the advised approach for applying a global style across the components, through the daisyUI theming system.
    </p>

    <x-anchor title="Through `app.css`" size="text-xl" class="mt-14 !mb-5" />

    <p>
        Use this as secondary approach, when theme variables is not enough.
    </p>

    <div data-theme="mytheme2">
        {{--@formatter:off--}}
        <x-code-example class="grid gap-5">
            @verbatim('docs')
                @php                            // [tl! .docs-hide]
                    $users = $this->users();      // [tl! .docs-hide]
                @endphp                         <!-- [tl! .docs-hide] -->
                <x-form wire:submit="save"> <!-- [tl! .docs-hide] -->
                <x-input label="Name" placeholder="Hello" hint="The full name" wire:model="name" />
                <x-select label="Country" placeholder="Select one" wire:model="country_id" />
                <x-toggle label="Terms" label="Select one" />
                <x-group label="User" label="Select one" wire:model="user_id" :options="$users" />
                <x-slot:actions><!-- [tl! .docs-hide] -->
                    <x-button type="submit" class="btn-primary" label="Save" /><!-- [tl! .docs-hide] -->
                </x-slot:actions><!-- [tl! .docs-hide] -->
                </x-form><!-- [tl! .docs-hide] -->
            @endverbatim
        </x-code-example>
        {{--@formatter:on--}}

        {{--@formatter:off--}}
        <x-code-example no-render language="css">
            @verbatim('docs')
                .input:not([class*="!input-error"]),
                .select:not([class*="!select-error"]),
                .toggle:not([class*="!checkbox-error"]) {
                    @apply border-primary outline-primary
                }

                .checkbox:checked, .toggle:checked, .radio:checked {
                    @apply text-primary;
                }

                .btn:checked {
                    @apply bg-primary border-none shadow-none;
                }

                .fieldset-legend {
                    @apply text-[0.9rem];
                }

                .fieldset-label, .fieldset .text-error {
                    @apply text-sm
                }
            @endverbatim
        </x-code-example>
        {{--@formatter:on--}}
    </div>

    <x-anchor title="Component classes" size="text-xl" class="mt-14 !mb-5" />

    <p>
        You can apply any CSS class to individual components for edge cases.
    </p>

    <x-code-example class="grid gap-5">
        @verbatim('docs')
            <x-input placeholder="Default" />
            <x-input placeholder="No outline" class="!outline-none" />
            <x-input placeholder="Primary" class="input-primary text-primary" />
            <x-select placeholder="Size" class="select-xl" />
        @endverbatim
    </x-code-example>

    <div class="pb-96"></div>

</div>
