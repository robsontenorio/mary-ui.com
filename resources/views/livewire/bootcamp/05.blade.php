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

    <x-button label="Spotlight docs" link="/docs/components/spotlight" icon="o-link" external class="btn-sm !no-underline" />

    <p>
        Give superpowers to your users and allow them to search for anything.
        On this example we will search only for usernames, but you can mix any type of content like other entities or even quick actions like "Create a user".
        Check the docs for more.
    </p>

    <img src="/bootcamp/05-c.png?new=2025" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <x-anchor title="Searching" size="text-xl" class="mt-14" />

    <p>
        Place the <strong>spotlight tag</strong> somewhere in the main layout.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                ...
                {{--  TOAST area --}}
                <x-toast />

                {{-- Spotlight --}}
                <x-spotlight />  <!-- [tl! highlight] -->
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Create an <code>App\Support\Spotlight</code> class with a <code>search</code> method that returns the result.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            namespace App\Support;

            use App\Models\User;
            use Illuminate\Http\Request;

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
                                'link' => "/users/{$user->id}/edit"
                            ];
                        });
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        <x-icon name="o-bolt" class="text-warning" />
        <strong>That is it!</strong>
    </p>

    <p>
        Try to hit <kbd class="kbd">Ctrl/Cmd</kbd> + <kbd class="kbd">G</kbd>
    </p>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Before proceeding, we recommend that you make a local commit to keep track of what is going on.
    </x-alert>

    <div class="flex justify-between mt-10">
        <x-button label="Updating users" link="/bootcamp/04" icon="o-arrow-left" class="!no-underline btn-ghost" />
        <x-button label="Authentication" link="/bootcamp/06" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>
</div>
