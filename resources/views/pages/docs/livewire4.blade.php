<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Upgrading to Livewire 4')]
#[Layout('components.layouts.app', ['description' => 'Upgrading to Livewire 4'])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Upgrading to Livewire 4" />

    <x-anchor title="Important" size="text-xl" class="mt-14" />
    <p>
        There are <b>no changes</b> in maryUI components.
    </p>

    <p>
        This is about Livewire/Volt and <b>has nothing to do</b> with maryUI.
    </p>

    <x-anchor title="Do I need this?" size="text-xl" class="mt-14" />

    <p>If you use class-based components with <b>Volt</b>, yes.</p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            # views/pages/users/show.blade.php

            use Livewire\Volt\Component;    // It extends from Volt
            ...

            new class extends Component {
                //...
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-code-example no-render language="php">
        @verbatim('docs')
            # routes/web.php

            Volt::route('/users/show', 'users.show');
        @endverbatim
    </x-code-example>

    <x-anchor title="What happened?" size="text-xl" class="mt-14" />

    <p>
        Now Livewire offers native support for class-based components. So, you need <b>to remove Volt</b> to avoid conflicts.
    </p>

    <x-anchor title="Upgrade" size="text-xl" class="mt-14" />

    <p>
        Install Livewire 4 Beta.
    </p>

    <x-code-example no-render language="bash">
        @verbatim('docs')
            composer require livewire/livewire:^4.0@beta
        @endverbatim
    </x-code-example>

    <p>
        Make all components to extend from <code>Livewire\Component</code>.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            # views/pages/users/show.blade.php

            use Livewire\Volt\Component;   // [tl! remove]
            use Livewire\Component; // [tl! add]
            ...

            new class extends Component {
                // ...
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        Change the routes at <code>routes/web.php</code>
    </p>

    <x-code-example no-render language="php">
        @verbatim('docs')
            // Imports
            use Livewire\Volt\Volt; // [tl! remove]
            ...

            // Routes
            Volt::route('/users/show', 'users.show');                 // [tl! remove]
            Route::livewire('/users/show', 'pages::users.show');      // [tl! add]
            ...
        @endverbatim
    </x-code-example>

    <p>
        Move all the layout files.
    </p>

    <x-code-example no-render language="bash">
        @verbatim('docs')
            `resources/views/components/layouts/*.blade.php` ➡️ `resources/views/layouts/*.blade.php

        @endverbatim
    </x-code-example>

    <p>
        Change the path of the custom layouts, if you have it.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            new
            #[Layout('components.layouts.custom')]     //[tl! remove]
            #[Layout('layouts.custom')]                //[tl! add]
            class extends Component {
                // ...
            };
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}
    <p>
        Remove this entry at <code>bootstrap/providers.php</code>.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            return [
                App\Providers\AppServiceProvider::class,
                App\Providers\VoltServiceProvider::class,   // [tl! remove]
                ...
            ];
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        Remove Volt.
    </p>

    <x-code-example no-render language="bash">
        @verbatim('docs')
            rm app/providers/VoltServiceProvider.php
            composer remove livewire/volt
        @endverbatim
    </x-code-example>

    <p>
        Clear the cache.
    </p>

    <x-code-example no-render language="bash">
        @verbatim('docs')
            # Clear the cache
            php artisan config:clear
            php artisan view:clear
        @endverbatim
    </x-code-example>
</div>
