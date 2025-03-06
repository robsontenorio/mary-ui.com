<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Upgrading')] class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Upgrading to v2" />

    <x-anchor title="maryUI v2" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        The most noticeable change in maryUI v2 is the look and feel, because it <b>follows daisyUI`s</b> design system and its default theme.
        Please, read the changelog ahead for more details.
    </p>

    <x-anchor title="daisyUI v5" size="text-2xl" class="mt-10 !mb-5" />
    <p>
        In v5, <b>daisyUI has changed the default theme</b> to a more modern and clean look. Remember that you can always change the theme, tweak
        theme variables or even override it with Tailwind, once maryUI does not ship with any custom CSS classes.
    </p>
    <p>
        Please, refer to its own release notes and changelog for more information.
    </p>

    <x-anchor title="Tailwind v4" size="text-2xl" class="mt-10 !mb-5" />

    <p>
        There are some notable changes in Tailwind <b>you should be aware</b>. Please, refer to its own release notes and changelog for more information.
    </p>

    <p>
        The following migration guide shows the new Tailwind feature that allows to configure it without the need of a <code>tailwind.config.js</code> file, in favor of <code>app.css</code>
        approach.
    </p>

    <x-anchor title="Upgrade it" size="text-2xl" class="mt-10 !mb-5" />

    <p>Upgrade to Laravel 12.</p>

    <x-code no-render language="bash">
        # Please, see the Laravel 12 upgrade guide.
        # It is a good time to upgrade Livewire as well
    </x-code>

    <p>Install maryUI v2.</p>

    <x-code no-render language="bash">
        @verbatim('docs')
            composer require robsontenorio/mary:^2.0
        @endverbatim
    </x-code>

    <p>Adjust your JS dependencies.</p>

    <x-code no-render language="bash">
        @verbatim('docs')
            # Remove `tailwind.config.js` and `postcss.config.js` from your project.
            rm tailwind.config.js postcss.config.js

            # Remove unnecessary dependencies from your `package.json`
            yarn remove autoprefixer postcss

            # Update and add new dependencies
            yarn add --dev daisyui tailwindcss @tailwindcss/vite laravel-vite-plugin vite
        @endverbatim
    </x-code>

    <p>Add the following lines to your <code>vite.config.js</code> file.</p>

    <!-- @formatter:off -->
    <x-code no-render language="javascript">
        @verbatim('docs')
            import {defineConfig} from 'vite';
            import laravel from 'laravel-vite-plugin';
            import tailwindcss from '@tailwindcss/vite' // [tl! add]

            ...

            plugins: [
                tailwindcss(), // [tl! add]
                ...
            ]

        @endverbatim
    </x-code>
    <!-- @formatter:on -->

    <p>Edit the top of your <code>app.css</code> file to look like this. Remember this is the <b>Tailwind v4 preferred setup</b>. Not daisyUI or maryUI.</p>

    {{--@formatter:off--}}
    <x-code no-render language="blade">
        @verbatim('docs')
            /* Remove these and any other `@tailwind` directives that if have it */
            @tailwind base;             <!-- [tl! remove] -->
            @tailwind components;       <!-- [tl! remove] -->
            @tailwind utilities;        <!-- [tl! remove] -->
            ...        <!-- [tl! remove] -->

            /* Tailwind */
            @import "tailwindcss";      <!-- [tl! add] -->

            /* daisyUI */
            @plugin "daisyui" {         <!-- [tl! add] -->
                themes: light --default, dark --prefersdark;  // Themes  <!-- [tl! add] -->
            }   <!-- [tl! add] -->

            /* Dark theme variant support */
            @custom-variant dark (&:where(.dark, .dark *)); <!-- [tl! add] -->

            /* Laravel 12 defaults */
            @source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'; <!-- [tl! add] -->
            @source '../../storage/framework/views/*.php'; <!-- [tl! add] -->
            @source "../**/*.blade.php"; <!-- [tl! add] -->
            @source "../**/*.js"; <!-- [tl! add] -->
            @source "../**/*.vue"; <!-- [tl! add] -->

            /* For maryUI */
            @source "../../app/**/**/*.php"; <!-- [tl! add] -->
            @source "../../vendor/robsontenorio/mary/src/View/Components/**/*.php"; <!-- [tl! add] -->

            /* Your styles goes here ... */
            /* ... */
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>Make sure to clear the view cache.</p>

    <x-code no-render language="bash">
        php artisan view:clear
    </x-code>

    <p>Run it.</p>

    <x-code no-render language="bash">
        yarn dev
    </x-code>

    <hr class="border-base-300" />

    <x-anchor title="Changelog" size="text-2xl" class="mt-10 !mb-5" />

    <x-anchor title="Themes" size="text-lg" class="!mb-5 mt-10" />
    <p>
        Remember that daisyUI has changed the default look and feel of many components.
        For more info on how to customize themes and variables, check daisyUI <a href="https://daisyui.com/docs/themes/" target="_blank">theme docs</a>.
    </p>

    <p>If you use <b>pre-built</b> daisyUI themes, that is the Tailwind v4 way to use it through plugins.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="sass">
        @verbatim('docs')
            /* Example for additional `aqua` and `retro` themes. */
            @plugin "daisyui" {
                themes: light --default, dark --prefersdark, retro, aqua;
            }

            /* Remeber to add the dark variant theme support */
            @custom-variant dark (&:where(.dark, .dark *));
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="All input components" size="text-lg" class="!mb-5 mt-10" />

    <p>
        The primary style was removed from all input components.
        If you want to make it looks like as before, you should add the respective <code>primary</code> class, depending on the component.
    </p>

    {{--@formatter:off--}}
    <x-code class="grid lg:grid-cols-2 gap-16">
    @verbatim('docs')
        <div class="grid gap-5 bg-base-200/80 rounded p-8"> <!-- [tl! .docs-hide] -->
        {{-- Default --}}
        <x-input label="Input" />
        <x-select label="Select" />
        <x-datetime label="Date" />
        <x-checkbox label="Checkbox" />
        <x-hr /> <!-- [tl! .docs-hide] -->
        And so on  ...
        </div>  <!-- [tl! .docs-hide] -->
        <div class="grid gap-5 bg-base-200/80 rounded p-8"> <!-- [tl! .docs-hide] -->

        {{-- If you like the primary style --}}
        <x-input label="Input" class="input-primary" />
        <x-select label="Select" class="select-primary" />
        <x-datetime label="Date" class="input-primary" />
        <x-checkbox label="Checkbox" class="checkbox-primary" />
        <x-hr /> <!-- [tl! .docs-hide] -->
        And so on  ...
        </div> <!-- [tl! .docs-hide] -->
    @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>If you previously have override the inputs <code>hint</code> and <code>error</code> classes, these are the new defaults from daisyUI.</p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            public ?string $hintClass = 'fieldset-label',
            public ?string $errorClass = 'text-error',
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Radio vs Group" size="text-lg" class="!mb-5 mt-10" />

    <p>
        The <code>x-radio</code> component was renamed to <code>x-group</code>, and now there is a new component called <code>x-radio</code>. They have the same API.
    </p>

    {{--@formatter:off--}}
    <x-code class="grid lg:grid-cols-2 gap-24">
    @verbatim('docs')
        @php                                            // [tl! .docs-hide]
            $users = App\Models\User::take(3)->get();   // [tl! .docs-hide]
        @endphp                                         <!-- [tl! .docs-hide] -->
        <div class="grid gap-5 border border-dashed border-base-300 rounded p-5"> <!-- [tl! .docs-hide] -->
        <x-radio label="Radio" :options="$users" wire:model="user" />
        </div> <!-- [tl! .docs-hide] -->
        <div class="grid gap-5 border border-dashed border-base-300 rounded p-5"> <!-- [tl! .docs-hide] -->
        <x-group label="Group" :options="$users" wire:model="user" />
        </div> <!-- [tl! .docs-hide] -->
    @endverbatim
    </x-code>
    {{--@formatter:on--}}

    {{--    <p>--}}
    {{--        You should keep an eye on maryUI's <a href="https://github.com/robsontenorio/mary/releases">releases page</a> to stay updated.--}}
    {{--    </p>--}}

    {{--    <x-code no-render language="bash">--}}
    {{--        composer require robsontenorio/mary--}}
    {{--    </x-code>--}}

    {{--    <p>--}}
    {{--        As maryUI uses <strong>daisyUI</strong> and <strong>Tailwind</strong> you should consider as well upgrade regularly their NPM packages and dependencies.--}}
    {{--    </p>--}}

    {{--    <x-code no-render language="bash">--}}
    {{--        yarn add --D daisyui tailwindcss postcss autoprefixer--}}
    {{--    </x-code>--}}

    {{--    <p>For sure, you want to keep Livewire updated as well.</p>--}}

    {{--    <x-code no-render language="bash">--}}
    {{--        composer require livewire/livewire--}}
    {{--    </x-code>--}}

    {{--    <x-anchor title="Recent releases" size="text-2xl" class="mt-10 !mb-5" />--}}

    {{--    <livewire:releases lazy />--}}
</div>
