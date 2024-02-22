<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - Spotlight')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Spotlight" />

    <x-button label="Spotlight docs" link="/docs/components/spotlight" icon-right="o-arrow-up-right" external class="btn-outline btn-sm" />

    <p>
        Give superpower to your users and allow them to search everything.
        On this example we will search only for users names, but you can mix any type of content like other entities or even quick actions like "Create a user".
        Check the docs for more.
    </p>

    <img src="/bootcamp/05-c.png" class="rounded-lg border shadow-xl mb-10 p-3" />

    <x-anchor title="Searching" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Place the <strong>spotlight tag</strong> somewhere on the main layout.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                ...
                {{--  TOAST area --}}
                <x-toast />

                {{-- Spotlight --}}
                <x-spotlight />  <!-- [tl! add] -->
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
                    // Filter users by name
                    // Transform the result to be compliant with Spotlight contract
                    return User::query()
                        ->where('name', 'like', "%$request->search%")
                        ->take(5)
                        ->get()
                        ->map(function (User $user) {
                            return [
                                'avatar' => $user->avatar ?? '/empty-user.jpg',
                                'name' => $user->name,
                                'description' => $user->email,
                                'link' => "/users/{$user->id}"
                            ];
                        });
                    }
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        <strong>That is it!</strong> You are done, try to hit <kbd class="kbd">Ctrl/Cmd</kbd> + <kbd class="kbd">G</kbd>
    </p>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Before proceed, we recommend to make a local commit to keep track what is going on.
    </x-alert>

    <div class="flex justify-between mt-10">
        <x-button label="Updating users" link="/bootcamp/04" icon="o-arrow-left" class="!no-underline btn-ghost" />
        <x-button label="Jetstream & Breeze" link="/bootcamp/06" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>
</div>
