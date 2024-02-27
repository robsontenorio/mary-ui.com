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
        Search for "a" to see what kind of content it returns. In this example, all links point to this page itself.
    </p>

    <kbd class="kbd">Ctrl/Cmd</kbd> + <kbd class="kbd">G</kbd>

    <x-anchor title="Usage" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Place the <strong>spotlight tag</strong> somewhere on the main layout.
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
        Create a <code>App\Support\Spotlight</code> class with a <code>search</code> method that returns the result.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            namespace App\Support;

            class Spotlight
            {
                public function search(Request $request)
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
        Instead of <code>avatar</code> you can use any pre-rendered blade <code>icon</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            [
                // ...
                'icon' => Blade::render("<x-icon name='o-bolt' />")
            ]
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        <x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />
        <strong>... You are done!</strong>
    </p>

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

    <x-anchor title="Manual activation" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can trigger the Spotlight component by dispatching a <code>mary-search-open</code> event.
        Probably you want to put this search button inside a navbar. In this case place an empty <code>x-data</code> as describe bellow.
    </p>

    <x-button label="Search" icon="o-magnifying-glass" @click.stop="$dispatch('mary-search-open')" />

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            {{-- Place an empty `x-data` on body--}}
            <body ... x-data>
                ...
                <nav>
                    {{-- Notice `@click.stop` --}}
                    <x-button label="Search" @click.stop="$dispatch('mary-search-open')" />
                </nav>

                <main>
                    {{ $slot }}
                </main>

                <x-spotlight />
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Security" size="text-2xl" class="mt-10 mb-5" />
    <p>
        As maryUI exposes a <strong>public route</strong> to make Spotlight work, remember to apply any security concern <strong>directly on your search method</strong>.
    </p>

    <x-anchor title="Example" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can organize your search however you want. Don't be restricted exclusively to the approach shown in this example.
        But, here an example that mixes "users" and "app actions".
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
        namespace App\Support;

        use App\Models\User;
        use Illuminate\Http\Request;
        use Illuminate\Support\Facades\Blade;

        class Spotlight
        {
            public function search(Request $request)
            {
                // Example of security concern
                // Guests can not search
                if(! auth()->user()) {
                    return [];
                }

                return collect()
                    ->merge($this->actions($request->search))
                    ->merge($this->users($request->search));
            }

            // Database search
            public function users(string $search = '')
            {
                return User::query()
                        ->where('name', 'like', "%$search%")
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

            // Static search, but it could come from a database
            public function actions(string $search = '')
            {
                $icon = Blade::render("<x-icon name='o-bolt' class='w-11 h-11 p-2 bg-yellow-50 rounded-full' />");

                return collect([
                    [
                        'name' => 'Create user',
                        'description' => 'Create a new user',
                        'icon' => $icon,
                        'link' => '/users/create'
                    ],
                    [
                        // More ...
                    ]
                ])->filter(fn(array $item) => str($item['name'] . $item['description'])->contains($search, true));
            }
        }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Slots" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Add anything you want and dispatch a <code>mary-search</code> event with an extra query string.
    </p>

    <p>
        You can do it in many ways. But, in this example we built it with Alpine.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-spotlight>
                <div
                    x-data="{ query: { withUsers: true, withActions: true } }"
                    x-init="$watch('query', value => $dispatch('mary-search', new URLSearchParams(value).toString()))"
                    class="flex gap-8 p-3"
                >
                    <x-checkbox label="Users" x-model="query.withUsers" />
                    <x-checkbox label="Actions" x-model="query.withActions" />
                </div>
            </x-spotlight>
        @endverbatim
    </x-code>

    <p>
        Then, adjust your <code>search</code> method to handle those new request parameters.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            class Spotlight
            {
                public function search(Request $request) {
                    // Do your logic here
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Changing the search class" size="text-2xl" class="mt-10 mb-5" />

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
