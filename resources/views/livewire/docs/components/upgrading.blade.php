<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Upgrading')] class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Upgrading to v2" />

    <p>
        maryUI v2 has been updated to use <b>daisyUI v5</b> and <b>Tailwind v4</b>.
        The following migration guide shows the new Tailwind feature that allows to configure it without the need of a <code>tailwind.config.js</code> file.
    </p>

    <x-alert icon="o-light-bulb" class="bg-warning/10 mb-8">
        There are some notable changes in Tailwind and daisyUI <b>you should be aware</b>. Please, refer to its own changelogs for more information..
    </x-alert>

    <hr />

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

            # Add new dependencies
            yarn add -D daisyui@next tailwindcss@next @tailwindcss/vite@next
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

    Edit the top of your <code>app.css</code> file to look like this.

    <x-code no-render language="blade">
        @verbatim('docs')
            @tailwind base;             <!-- [tl! remove] -->
            @tailwind components;       <!-- [tl! remove] -->
            @tailwind utilities;        <!-- [tl! remove] -->

            @import "tailwindcss";      <!-- [tl! add] -->
            @plugin "daisyui";          <!-- [tl! add] -->

            @source "../views/**/**/*.blade.php";       <!-- [tl! add] -->
            @source "../../app/**/**/*.php";            <!-- [tl! add] -->
            @source "../../vendor/robsontenorio/mary/src/View/Components/**/*.php";     <!-- [tl! add] -->
            @source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';    <!-- [tl! add] -->

            // Your styles goes here ...
        @endverbatim
    </x-code>

    <hr />

    <x-anchor title="Changelog" size="text-2xl" class="mt-10 !mb-5" />

    <x-anchor title="All input components" size="text-lg" class="!mb-5" />

    <p>
        The primary style was removed from all input components.
        If you want to make it primary, you should add the proper <code>xxxxx-primary</code> class, depending on the component.
    </p>

    {{--@formatter:off--}}
    <x-code class="grid lg:grid-cols-2 gap-16">
    @verbatim('docs')
        <div class="grid gap-5 border border-dashed border-base-300 rounded p-5"> <!-- [tl! .docs-hide] -->
        {{-- Default --}}
        <x-input label="Input" />
        <x-select label="Select" />
        <x-datetime label="Date" />
        <x-checkbox label="Checkbox" />
        // And so on for other components ...
        </div>  <!-- [tl! .docs-hide] -->
        <div class="grid gap-5 border border-dashed border-base-300 rounded p-5"> <!-- [tl! .docs-hide] -->

        {{-- Make it primary --}}
        <x-input label="Input" class="input-primary" />
        <x-select label="Select" class="select-primary" />
        <x-datetime label="Date" class="input-primary" />
        <x-checkbox label="Checkbox" class="checkbox-primary" />
        // And so on for other components ...
        </div> <!-- [tl! .docs-hide] -->
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

    <x-anchor title="Recent releases" size="text-2xl" class="mt-10 !mb-5" />

    <livewire:releases lazy />
</div>
