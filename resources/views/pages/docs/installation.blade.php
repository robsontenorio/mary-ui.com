<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Installation')] class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Installation" />

    <p>
        This package <strong>does not ship any custom CSS</strong> and relies on <strong>daisyUI and Tailwind</strong> for out-of-box styling.
        You can customize most of the components' styles, by inline overriding daisyUI and Tailwind CSS classes.
    </p>

    <x-alert icon="o-light-bulb">
        Please, for further styles reference see <a href="https://daisyui.com" target="_blank">daisyUI</a> and <a href="https://tailwindcss.com" target="_blank">Tailwind</a>.
    </x-alert>

    <x-anchor title="Bootcamp" size="text-xl" class="mt-14 !mb-5" />

    <p>
        If you prefer a walkthrough guide, go to maryUI <a href="/bootcamp/01">Bootcamp</a> and get amazed how much you can do with minimal effort.
    </p>

    <x-anchor title="Automatic install" size="text-xl" class="mt-14 !mb-5" />

    <span class="rounded py-2 px-4 bg-warning/40 text-sm">
        If you already have a <b>maryUI v1</b> you must follow the
        <a href="/docs/upgrading">upgrade guide</a>, instead of installing again.
    </span>

    <p>
        After installing make sure to check the <a href="/docs/layout" wire:navigate>Layout</a>
        and <a href="/docs/layout" wire:navigate>Sidebar</a> docs.
    </p>

    <x-code no-render language="bash">
        composer require robsontenorio/mary

        php artisan mary:install
    </x-code>

    <p>
        Then, start the dev server.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="bash">
        yarn dev   # or `npm run dev`
    </x-code>
    {{--@formatter:on--}}

    <p>
        <x-icon name="o-bolt" class="text-warning" />
        <strong>You are done!</strong>
    </p>

    <x-anchor title="Renaming components" size="text-xl" class="mt-14" />
    <p>
        If for some reason you need to rename maryUI components using a custom prefix, publish the config file.
    </p>

    <x-code no-render language="bash">
        php artisan vendor:publish --tag mary.config
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            return [
                /**
                 * Default is empty.
                 *    'prefix' => ''
                 *              <x-button />
                 *              <x-card />
                 *
                 * Renaming all components:
                 *    'prefix' => 'mary-'
                 *               <x-mary-button />
                 *               <x-mary-card />
                 */
                'prefix' => ''
            ];
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    Make sure to clear view cache after renaming.

    <x-code no-render language="bash">
        php artisan view:clear
    </x-code>

    <x-anchor title="Jetstream and Breeze" size="text-xl" class="mt-14" />

    <x-alert icon="o-light-bulb">
        If you are facing some UI glitches, try to remove <code>@tailwindcss/forms</code> plugin.
    </x-alert>

    <p>
        For existing projects that uses <strong>Jetstream</strong> or <strong>Breeze</strong>, the installer will publish <code>config/mary.php</code>
        with a global prefix on maryUI components to avoid name collision. So, you need to use components like this:
    </p>
    <p>
        <code>x-mary-button</code> , <code>x-mary-card</code> <code>x-mary-icon</code> ...
    </p>

    <p>
        The maryUI components provides a great DX that probably you may want to use its components instead of default Jetstream/Breeze components.
    </p>

    <p>
        <strong>Breeze</strong>
    </p>
    <x-code no-render>
        @verbatim('docs')
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        @endverbatim
    </x-code>

    <p>
        <strong>Jetstream</strong>
    </p>
    <x-code no-render>
        @verbatim('docs')
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
        @endverbatim
    </x-code>

    <p>
        <strong>maryUI</strong>
    </p>
    <x-code no-render>
        @verbatim('docs')
            <x-mary-input label="Name" wire:model="name" />
        @endverbatim
    </x-code>

    <p>
        <strong>Still not convinced?</strong>
    </p>

    <p>
        Go to the <a href="/bootcamp/01">Bootcamp</a> and get amazed how much you can do with minimal effort, from the ground with no starter kits.
    </p>
</div>
