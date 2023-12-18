<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Spotlight")]
#[Layout('components.layouts.app', [
    'description' => 'Livewire UI spotlight component with
a global search feature triggered by a customizable shortcut.
It does not index your site, so you need to implement by yourself a global search function.'
])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Spotlight" />

    <p>
        This component implements a global search feature triggered by a customizable shortcut.
        <strong>It does not index your site</strong>, so you need to implement by yourself a global search function.
    </p>

    <x-anchor title="Try it" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Search for "a" to see what kind of content it returns.
    </p>

    <kbd class="kbd">Ctrl/Cmd</kbd> + <kbd class="kbd">G</kbd>

    <x-anchor title="Usage" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Place <strong>spotlight tag</strong> anywhere on the main layout.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                ...
                <x-spotlight />  <!-- [tl! highlight .animate-bounce] -->
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Create <code>App\Support\Spotlight</code> class with a <code>search()</code> method that returns the result.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            namespace App\Support;

            class Spotlight
            {
                public function search(mixed $query = '')
                {
                    // Do your search logic here
                    // IMPORTANT: apply any security concern here
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Make sure each item from your collection contains the following keys.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            [
                'name' => 'Mary',                           // Any string
                'description' => 'Software Engineer',       // Any string
                'link' => '/users/1',                       // Any valid route
                'avatar' => 'http://...'                    // Any image url
            ]
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Instead of <code>avatar</code> you can use any rendered blade <code>icon</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            [
                // ...
                'icon' => Blade::render("<x-icon name='o-bolt' class='w-11 h-11 p-2 bg-yellow-50 rounded-full' />")
            ]
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        <x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />
        <strong>... You are done!</strong>
    </p>

    <x-anchor title="Security" size="text-2xl" class="mt-10 mb-5" />
    <p>
        As Mary exposes a <strong>public route</strong> to make spotlight work, remember to apply any security concern <strong>directly on your search method</strong>.
    </p>

    <x-anchor title="Example" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can organize your search however you want. Don't be restricted exclusively to the strategy shown in this example.
        But, here an example that mixes "users" and "app actions".
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
        namespace App\Support;

        use App\Models\User;
        use Blade;

        class Spotlight
        {
            public function search(mixed $query = '')
            {
                // Example of security concern
                // Guests can not search
                if(! auth()->user()) {
                    return [];
                }

                return collect()
                    ->merge($this->actions($query))
                    ->merge($this->users($query));
            }

            public function users(mixed $query = '')
            {
                // Example of security concern
                // Only admins can search for users
                if(! auth()->user()->isAdmin()) {
                    return [];
                }

                return User::query()
                        ->where('name', 'like', "%$query%")
                        ->take(5)
                        ->get()
                        ->map(function (User $user) {
                            return [
                                'avatar' => $user->profile_picture,
                                'name' => $user->name,
                                'description' => $user->email,
                                'link' => "/users/{$user->id}"
                            ];
                        });
            }

            public function actions(mixed $search = '')
            {
                // Security concern
                // Any authenticated user can search

                $icon = Blade::render("<x-icon name='o-bolt' class='w-11 h-11 p-2 bg-yellow-50 rounded-full' />");

                return collect([
                    [
                        'name' => 'Create user',
                        'description' => 'Create a new user',
                        'icon' => $icon,
                        'link' => '/users/create'
                    ],
                    [
                        'name' => 'Recent orders',
                        'description' => 'See recent placed orders',
                        'icon' => $icon,
                        'link' => '/orders/recent'
                    ],
                    [
                        // More ...
                    ]
                ])->filter(function (array $item) use ($search) {
                    return str($item['name'] . $item['description'])->lower()->contains($search);
                });
            }
        }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Options" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can change the <code>shortcut</code> with any combination supported
        <a href="https://livewire.laravel.com/docs/actions#listening-for-specific-keys">by Livewire</a>.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-spotlight
                shortcut="meta.slash"
                search-text="Find docs, app actions or users"
                no-results-text="Ops! Nothing here." />
        @endverbatim
    </x-code>

    <x-anchor title="Changing search class" size="text-2xl" class="mt-10 mb-5" />

    <p>
        If for some reason you want to change the search class, publish the config file.
    </p>

    <x-code no-render language="bash">
        php artisan vendor:publish --tag mary.config
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            // ...
            'components' => [
                'spotlight' => [
                    'class' => 'App\Support\Spotlight'
                ]
            ]
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

</div>
