<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - Jetstream & Breeze')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Jetstream & Breeze" />

    <p>
        If you have a project with Jetstream/Breeze the maryUI installer adds a global prefix <code>x-mary-</code> on maryUI components to avoid naming collision.
        You are ready to go, just add maryUI components to your project.
    </p>

    <x-anchor title="Trade-off" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Remember that starter kits add a dozen files that you probably will not use. You have to tweak and maintain
        them by yourself, because they are copied into your project.
    </p>

    <p>
        On the other hand you can think it is a waste of time to build everything from the ground.
        But at least later you will have minimal code to maintain.
    </p>

    <ul>
        <li><strong>Stater kit:</strong> works out of the box, but adds extra code to maintain.</li>
        <li><strong>From the ground:</strong> needs extra time to setup, but adds minimal code.</li>
    </ul>

    <p>
        Let's see how easy it is to implement exactly the features we need from the ground in no time, without starter kits.
    </p>
    <ul>
        <li>Layout</li>
        <li>Components</li>
        <li>Authentication</li>
        <li>Register</li>
    </ul>

    <x-anchor title="Layout" size="text-2xl" class="mt-10 mb-5" />

    <p>
        There's not much to say here. As you can see on this Bootcamp, maryUI ships with a default layout. You can look for another layout alternative in the docs, but this is very
        personal.
    </p>

    <x-anchor title="Components" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The maryUI components provide a great DX and you don't have to worry about maintaining the components by yourself.
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

    <x-anchor title="Authentication" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Here is what <code>routes/web.php</code> looks like with Authentication.
    </p>
    <ul>
        <li>Login route.</li>
        <li>Logout route.</li>
        <li>Protect some routes.</li>
    </ul>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use Illuminate\Support\Facades\Route;
            use Livewire\Volt\Volt;

            // Users will be redirected to this route if not logged in
            Volt::route('/login', 'login')->name('login');

            // Define the logout
            Route::get('/logout', function () {
                auth()->logout();
                request()->session()->invalidate();
                request()->session()->regenerateToken();

                return redirect('/');
            });

            // Protected routes here
            Route::middleware('auth')->group(function () {
                Volt::route('/', 'index');
                Volt::route('/users', 'users.index');
                Volt::route('/users/create', 'users.create');
                Volt::route('/users/{user}/edit', 'users.edit');
                // ... more
            });

        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Create an empty layout at <code>resources/views/components/layouts/empty.blade.php</code> to use it as our login page.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <!DOCTYPE html>
            <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>
            <body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
                {{-- You could elaborate the layout here --}}
                {{-- The important part is to have a different layout from the main app layout --}}
                <x-main full-width>
                    <x-slot:content>
                        {{ $slot }}
                    </x-slot:content>
                </x-main>
            </body>
            </html>
        @endverbatim
    </x-code>

    <p>
        And here is the login component.
    </p>

    <x-code no-render language="zsh">
        php artisan make:volt login --class
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use Livewire\Attributes\Layout;
            use Livewire\Attributes\Rule;
            use Livewire\Attributes\Title;
            use Livewire\Volt\Component;

            new
            #[Layout('components.layouts.empty')]       // <-- Here is the `empty` layout
            #[Title('Login')]
            class extends Component {

                #[Rule('required|email')]
                public string $email = '';

                #[Rule('required')]
                public string $password = '';

                public function mount()
                {
                    // It is logged in
                    if (auth()->user()) {
                        return redirect('/');
                    }
                }

                public function login()
                {
                    $credentials = $this->validate();

                    if (auth()->attempt($credentials)) {
                        request()->session()->regenerate();

                        return redirect()->intended('/');
                    }

                    $this->addError('email', 'The provided credentials do not match our records.');
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-code no-render>
        @verbatim('docs')
            <div class="w-96 mx-auto mt-20">
                <div class="mb-10">Cool image here</div>

                <x-form wire:submit="login">
                    <x-input label="E-mail" wire:model="email" icon="o-envelope" inline />
                    <x-input label="Password" wire:model="password" type="password" icon="o-key" inline />

                    <x-slot:actions>
                        <x-button label="Create an account" class="btn-ghost" link="/register" />
                        <x-button label="Login" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
                    </x-slot:actions>
                </x-form>
            </div>
        @endverbatim
    </x-code>

    <p>
        <strong>That is it!</strong>
    </p>
    <p>
        Try to navigate to a protected route, and you will be redirected to the login page.
        The default app layout shipped with maryUI shows the authenticated user and logout button for you.
    </p>

    <x-anchor title="Register" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Add this <strong>public</strong> extra route to <code>web.php</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use Livewire\Volt\Volt;

            Volt::route('/register', 'register');

        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Create the registration form.
    </p>

    <x-code no-render language="zsh">
        php artisan make:volt register --class
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use App\Models\User;
            use Livewire\Attributes\Layout;
            use Livewire\Attributes\Rule;
            use Livewire\Attributes\Title;
            use Livewire\Volt\Component;
            use Illuminate\Support\Facades\Hash;

            new
            #[Layout('components.layouts.empty')]       // <-- The same `empty` layout
            #[Title('Login')]
            class extends Component {

                #[Rule('required')]
                public string $name = '';

                #[Rule('required|email|unique:users')]
                public string $email = '';

                #[Rule('required|confirmed')]
                public string $password = '';

                #[Rule('required')]
                public string $password_confirmation = '';

                public function mount()
                {
                    // It is logged in
                    if (auth()->user()) {
                        return redirect('/');
                    }
                }

                public function register()
                {
                    $data = $this->validate();

                    $data['avatar'] = '/empty-user.jpg';
                    $data['password'] = Hash::make($data['password']);

                    $user = User::create($data);

                    auth()->login($user);

                    request()->session()->regenerate();

                    return redirect('/');
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-code no-render>
        @verbatim('docs')
            <div class="w-96 mx-auto mt-20">
                <div class="mb-10">Cool image here</div>

                <x-form wire:submit="register">
                    <x-input label="Name" wire:model="name" icon="o-user" inline />
                    <x-input label="E-mail" wire:model="email" icon="o-envelope" inline />
                    <x-input label="Password" wire:model="password" type="password" icon="o-key" inline />
                    <x-input label="Confirm Password" wire:model="password_confirmation" type="password" icon="o-key" inline />

                    <x-slot:actions>
                        <x-button label="Already registered?" class="btn-ghost" link="/login" />
                        <x-button label="Register" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
                    </x-slot:actions>
                </x-form>
            </div>
        @endverbatim
    </x-code>

    <p>
        <strong>It is done!</strong>
    </p>

    <p>
        Hit the <strong>/register</strong> route on browser and create an account. As you are logged in, file uploads will work in the <strong>HTML Editor</strong> component.
    </p>

    <div class="flex justify-between mt-10">
        <x-button label="Spotlight" link="/bootcamp/05" icon="o-arrow-left" class="!no-underline btn-ghost" />
        <x-button label="A wrap" link="/bootcamp/07" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>
</div>
