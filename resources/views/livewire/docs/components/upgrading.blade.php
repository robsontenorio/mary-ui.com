<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Upgrading')] class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Upgrading to v2" />

    <x-alert title="This is a beta version. Some components can change before the final release (March 31st)." class="bg-warning/40" />

    <x-anchor title="WIP" size="text-xl" class="mt-14" />
    <ul>
        <li>Migrate the "Choices" component.</li>
        <li>Remaster the Bootcamp.</li>
        <li>Remaster the demos.</li>
    </ul>

    <x-anchor title="Why" size="text-xl" class="mt-14" />

    <p>If you want to use <b>Laravel 12+</b> you should upgrade.</p>

    <ul>
        <li><b>Tailwind 4</b> brings a lot of new features and improvements.</li>
        <li><b>Laravel 12</b> default skeleton uses the new CSS setup from <b>Tailwind 4.</b></li>
        <li><b>daisyUI 5</b> uses a lot of <b>Tailwind 4</b> features.</li>
        <li><b>maryUI 2</b> is here to stick to the new defaults.</li>
    </ul>

    <x-anchor title="Important" size="text-xl" class="mt-14" />
    <p>
        There are some notable changes in Tailwind and daisyUI <b>you should be aware</b>. Please, refer to its own release notes and changelog for more information.
    </p>

    <x-anchor title="Upgrade it" size="text-xl" class="mt-14" />

    <span class="rounded py-2 px-4 bg-warning/40 text-sm">
        If you are starting a new project you must follow the
        <a href="/docs/installation">installation guide</a> instead.
    </span>

    <br><br>

    <div class="collapse bg-base-100 border-base-300 border collapse-arrow">
        <input type="checkbox" />
        <div class="collapse-title font-semibold">Using <code>app.css</code> (recommended)</div>
        <div class="collapse-content overflow-x-auto bg-base-200/70 px-8 border-t border-base-300">

            <p>Upgrade to Laravel 12 (optional).</p>

            <x-code no-render language="bash">
                @verbatim('docs')
                    # It is a good time to upgrade all the things.
                @endverbatim
            </x-code>

            <p>Install maryUI v2.</p>

            <x-code no-render language="bash">
                @verbatim('docs')
                    # This will change after v2 release
                    composer require robsontenorio/mary:V2.x-dev
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

            <p>Edit the top of your <code>app.css</code> file to look like this. Remember this is the <b>Tailwind 4 preferred setup</b>, not daisyUI or maryUI.</p>

            <!-- @formatter:off -->
            <x-code no-render language="blade">
                @verbatim('docs')
                /* Remove these and any other `@tailwind` directives if you have it */
                @tailwind base;             <!-- [tl! remove] -->
                @tailwind components;       <!-- [tl! remove] -->
                @tailwind utilities;        <!-- [tl! remove] -->
                ...        <!-- [tl! remove] -->

                /* Tailwind */
                @import "tailwindcss";      <!-- [tl! add] -->

                /* daisyUI */
                @plugin "daisyui" {         <!-- [tl! add] -->
                    themes: light --default, dark --prefersdark;   <!-- [tl! add] -->
                }   <!-- [tl! add] -->

                /* maryUI */
                @source "../../vendor/robsontenorio/mary/src/View/Components/**/*.php"; <!-- [tl! add] -->

                /* Dark theme variant support */
                @custom-variant dark (&:where(.dark, .dark *)); <!-- [tl! add] -->

                /* Laravel 12 defaults */
                @source "../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"; <!-- [tl! add] -->
                @source "../../storage/framework/views/*.php"; <!-- [tl! add] -->
                @source "../**/*.blade.php"; <!-- [tl! add] -->
                @source "../**/*.js"; <!-- [tl! add] -->
                @source "../**/*.vue"; <!-- [tl! add] -->

                /* Your styles goes here ... */
                /* ... */
                @endverbatim
                <!-- @formatter:on -->
            </x-code>
        </div>
    </div>

    <x-anchor title="Changelog" size="text-xl" class="mt-14" />

    <x-anchor title="Appearance" size="text-lg" class="!mb-5 mt-10" />

    <p>The most noticeable change in maryUI 2 is the appearance, because we follow daisyUI`s design system. And it has changed to a more modern look and feel.</p>

    <p>
        Remember that you can always change the theme, tweak theme variables or even override it with Tailwind,
        once maryUI does not ship with any custom CSS classes.
        For more info on how to customize themes and variables, check daisyUI <a href="https://daisyui.com/docs/themes/" target="_blank">theme docs</a>.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Avoid deeper CSS tweaks and use theme variables instead.
    </x-alert>

    <x-anchor title="Small CSS changes" size="text-lg" class="!mb-5 mt-10" />

    <p>
        Some components classes were internally rearranged to better control of spacing and positioning. Consider to revisit the docs examples and compare with your current
        implementation.
    </p>

    <x-anchor title="Theme Toggle" size="text-lg" class="!mb-5 mt-10" />
    <p>
        This is the Tailwind 4 way to use themes and toggle the dark mode. See <a href="/docs/components/theme-toggle">Theme Toggle</a> for more info.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="sass">
        @verbatim('docs')
            /* daisyUI */
            @plugin "daisyui" {
                themes: light --default, dark --prefersdark;
            }

            /* Remeber to add the dark variant theme support */
            @custom-variant dark (&:where(.dark, .dark *));
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="All input components" size="text-lg" class="!mb-5 mt-10" />

    <p>
        The primary style was removed from all input components.
        If you want to make it looks like as before, you can add the respective <code>primary</code> class, depending on the component.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Consider to use the new defaults instead of primary classes. UX people approve it :)
    </x-alert>

    {{--@formatter:off--}}
    <x-code no-render class="grid lg:grid-cols-2 gap-8">
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
</div>
