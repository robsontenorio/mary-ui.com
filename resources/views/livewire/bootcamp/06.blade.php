<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - Authentication')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Authentication" />

    <p>
        Let's see how easy it is to implement authentication and registration features from the ground in no time, <b>without any starter kits.</b>
    </p>
    <ul>
        <li>Routes</li>
        <li>Template</li>
        <li>Login</li>
        <li>Registration</li>
    </ul>

    <x-anchor title="Routes" size="text-xl" class="mt-14" />

    <p>
        Here is what <code>routes/web.php</code> looks like with authentication.
    </p>
    <ul>
        <li>Login route.</li>
        <li>Logout route.</li>
        <li>Protect some routes.</li>
    </ul>

    <p>
        Go ahead and copy/paste this.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
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
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Template" size="text-xl" class="mt-14" />

    <p>
        Create an new layout at <code>resources/views/components/layouts/empty.blade.php</code>. We are going to use this layout for the login and registration pages.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <!DOCTYPE html>
            <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                @vite(['resources/css/app.css', 'resources/js/app.js'])
            </head>
            <body class="min-h-screen font-sans antialiased bg-base-200">
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
    </x-code-example>

    <x-anchor title="Login page" size="text-xl" class="mt-14" />

    <p>
        Create the login component.
    </p>

    <x-code-example no-render language="zsh">
        php artisan make:volt login --class
    </x-code-example>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            use Livewire\Attributes\Layout;
            use Livewire\Attributes\Rule;
            use Livewire\Attributes\Title;
            use Livewire\Volt\Component;

            new
            #[Layout('components.layouts.empty')]       // [tl! highlight] <-- Here is the `empty` layout
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
    </x-code-example>
    {{--@formatter:on--}}

    <x-code-example no-render>
        @verbatim('docs')
            <div class="md:w-96 mx-auto mt-20">
                <div class="mb-10">
                    <x-app-brand />
                </div>

                <x-form wire:submit="login">
                    <x-input placeholder="E-mail" wire:model="email" icon="o-envelope" />
                    <x-input placeholder="Password" wire:model="password" type="password" icon="o-key" />

                    <x-slot:actions>
                        <x-button label="Create an account" class="btn-ghost" link="/register" />
                        <x-button label="Login" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="login" />
                    </x-slot:actions>
                </x-form>
            </div>
        @endverbatim
    </x-code-example>

    <p>
        <x-icon name="o-bolt" class="text-warning" />
        <strong>That is it!</strong>
    </p>
    <p>
        Try to navigate to a protected route, and you will be redirected to the login page.
        The default app layout shipped with maryUI shows the authenticated user and logout button for you.
    </p>

    <x-anchor title="Registration page" size="text-xl" class="mt-14" />

    <p>
        Add this <strong>public</strong> route to <code>web.php</code>.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            use Livewire\Volt\Volt;

            // Public routes
            Volt::route('/register', 'register'); // [tl! highlight]

            // Protected routes here
            Route::middleware('auth')->group(function () {
                // ...
            });

        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        Create the registration form.
    </p>

    <x-code-example no-render language="zsh">
        php artisan make:volt register --class
    </x-code-example>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            use App\Models\User;
            use Livewire\Attributes\Layout;
            use Livewire\Attributes\Rule;
            use Livewire\Attributes\Title;
            use Livewire\Volt\Component;
            use Illuminate\Support\Facades\Hash;

            new
            #[Layout('components.layouts.empty')]       // [tl! highlight] <-- The same `empty` layout
            #[Title('Registration')]
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
    </x-code-example>
    {{--@formatter:on--}}

    <x-code-example no-render>
        @verbatim('docs')
            <div class="md:w-96 mx-auto mt-20">
                <div class="mb-10">
                    <x-app-brand />
                </div>

                <x-form wire:submit="register">
                    <x-input placeholder="Name" wire:model="name" icon="o-user" />
                    <x-input placeholder="E-mail" wire:model="email" icon="o-envelope" />
                    <x-input placeholder="Password" wire:model="password" type="password" icon="o-key" />
                    <x-input placeholder="Confirm Password" wire:model="password_confirmation" type="password" icon="o-key" />

                    <x-slot:actions>
                        <x-button label="Already registered?" class="btn-ghost" link="/login" />
                        <x-button label="Register" type="submit" icon="o-paper-airplane" class="btn-primary" spinner="register" />
                    </x-slot:actions>
                </x-form>
            </div>
        @endverbatim
    </x-code-example>

    <p>
        <x-icon name="o-bolt" class="text-warning" />
        <strong>It is done!</strong>
    </p>

    <p>
        Hit the <strong>/register</strong> route on browser and create an account.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        As you are logged in, file uploads will work in the <strong>HTML Editor</strong> component
    </x-alert>

    <div class="flex justify-between mt-10">
        <x-button label="Spotlight" link="/bootcamp/05" icon="o-arrow-left" class="!no-underline btn-ghost" />
        <x-button label="A wrap" link="/bootcamp/07" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>
</div>
