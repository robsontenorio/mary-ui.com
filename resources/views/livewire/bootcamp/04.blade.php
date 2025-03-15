<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - Updating users')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Updating users" />

    <p>
        Let's build a nice form layout that contains a file upload and cropping components!
    </p>

    <img src="/bootcamp/04-a.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <x-anchor title="New Components & Routes" size="text-xl" class="mt-14" />

    Let's create some new Volt components by using the <code>class</code> syntax.

    {{--@formatter:off--}}
    <x-code no-render language="bash">
        php artisan make:volt index --class             # Home
        php artisan make:volt users/create --class      # Create
        php artisan make:volt users/edit --class        # Edit
    </x-code>
    {{--@formatter:on--}}

    <p>
        Before moving forward, let's adjust some routes on <code>web.php</code> to make naming consistent.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        Volt::route('/', 'users.index'); // [tl! remove]
        Volt::route('/', 'index');                          // Home [tl! add]
        Volt::route('/users', 'users.index');               // User (list) [tl! add]
        Volt::route('/users/create', 'users.create');       // User (create) [tl! add]
        Volt::route('/users/{user}/edit', 'users.edit');    // User (edit) [tl! add]
    </x-code>
    {{--@formatter:on--}}

    <p>
        As you can see, maryUI ships with a default app template. Make some adjustments to the menu links to add new routes and then <strong>check it in the browser</strong>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            // resources/views/components/layouts/app.blade.php

            <x-menu-item title="Hello" icon="o-sparkles" link="/" /> <!-- [tl! remove] -->
            <x-menu-item title="Home" icon="o-sparkles" link="/" /> <!-- [tl! add] -->
            <x-menu-item title="Users" icon="o-users" link="/users" /> <!-- [tl! add] -->
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-button label="Menu docs" link="/docs/components/menu" icon="o-arrow-up-right" external class="btn-sm !no-underline" />

    <p>
        Here, we are making use of the <code>x-menu</code> and <code>x-menu-item</code> components. They work seamless among the default sidebar shipped by maryUI.
        Additionally, it keeps the correct menu item selected based on the user's current route and sub-routes, as they navigate deeply.
    </p>

    <x-anchor title="Form components" size="text-xl" class="mt-14" />

    <div class="flex gap-3">
        <x-button label="Form docs" link="/docs/components/form" icon="o-arrow-up-right" external class=" btn-sm !no-underline" />
        <x-button label="Input docs" link="/docs/components/input" icon="o-arrow-up-right" external class=" btn-sm !no-underline" />
        <x-button label="Select docs" link="/docs/components/input" icon="o-arrow-up-right" external class=" btn-sm !no-underline" />
    </div>

    <img src="/bootcamp/04-g.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        First, we need to create a link from our table to the new edit component. This is easier than anything with the <code>x-table</code> component.
        Go back to <code>users/index</code> and make the following change:
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            {{-- livewire/users/index.blade.php --}}
            <x-table ... link="users/{id}/edit">

            {{-- You could pass any parameter based on model columns' name --}}
            <x-table ... link="users/{id}/edit?name={name}&city={city.name}">
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        After that change you can see <strong>an empty screen</strong> when visiting the <code>users/edit</code> component.
        However, it means that the link is working as expected, as you can see in the browser's url.
    </p>

    <p>
        Now, in the <code>users/edit</code> component, add <code>User</code> as a component parameter.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use App\Models\User; // [tl! highlight:1]
            use Mary\Traits\Toast;

            new class extends Component {
                // We will use it later [tl! highlight:1]
                use Toast;

                // Component parameter [tl! highlight:1]
                public User $user;
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Let's add an <code>x-header</code> in the blade section to test if the User parameter is working. And It will work because of the Laravel route binding mechanism for
        models.
    </p>

    <img src="/bootcamp/04-aa.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <div>
                // <!-- [tl! remove] -->
                <x-header title="Update {{ $user->name }}" separator /> <!-- [tl! add] -->
            </div>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Now, let's add the component properties that represent the <code>User</code> model properties, with their respective Livewire validation rules.
        Additionally, we will include an extra property using the Volt <code>with()</code> method to get all available countries.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use Livewire\Attributes\Rule; //[tl! highlight:1]
            use App\Models\Country;

            new class extends Component {
                use Toast;

                public User $user;

                // You could use Livewire "form object" instead.
                #[Rule('required')] // [tl! highlight:8]
                public string $name = '';

                #[Rule('required|email')]
                public string $email = '';

                // Optional
                #[Rule('sometimes')]
                public ?int $country_id = null;

                // We also need this to fill Countries combobox on upcoming form
                public function with(): array // [tl! highlight:5]
                {
                    return [
                        'countries' => Country::all()
                    ];
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Now, move to the blade section and let's add the UI components.
        You will discover in the docs that most of the components have a set of available properties and slots that will make things easier for you.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <div>
                <x-header title="Update {{ $user->name }}" separator />

                <x-form wire:submit="save"> <!-- [tl! highlight:11] -->
                    <x-input label="Name" wire:model="name" />
                    <x-input label="Email" wire:model="email" />
                    <x-select label="Country" wire:model="country_id" :options="$countries" placeholder="---" />

                    <x-slot:actions>
                        <x-button label="Cancel" link="/users" />
                        {{-- The important thing here is `type="submit"` --}}
                        {{-- The spinner property is nice! --}}
                        <x-button label="Save" icon="o-paper-airplane" spinner="save" type="submit" class="btn-primary" />
                    </x-slot:actions>
                </x-form>
            </div>
        @endverbatim
    </x-code>

    <p>
        Check in the browser if it is working... <strong>and if the form is not filled.</strong>
    </p>

    <img src="/bootcamp/04-g.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        We can "fix" this by using the Livewire <code>mount()</code> method and its handy <code>fill()</code> method to fill
        automatically all the component's properties <strong>that match</strong> with the target model fields.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            public function mount(): void
            {
                $this->fill($this->user);
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Of course if you hit the "Save" button <strong>you get an error</strong>, because we don't have the <code>save()</code> method in place.
        So, let's add it.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            public function save(): void
            {
                // Validate
                $data = $this->validate();

                // Update
                $this->user->update($data);

                // You can toast and redirect to any route
                $this->success('User updated with success.', redirectTo: '/users');
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="File component" size="text-xl" class="mt-14" />

    <x-button label="File docs" link="/docs/components/file" icon="o-link" external class="btn-sm !no-underline" />

    <img src="/bootcamp/04-h.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        Let's make it cool and add a user avatar.
    </p>

    <p>
        Notice we added the <code>users.avatar</code> column in the migration files during the Bootcamp setup.
    </p>

    <p>
        In order to upload files with Laravel remember you need to create a storage link to make the local disk available.
    </p>

    <x-code no-render language="bash">
        php artisan storage:link
    </x-code>

    <p>
        Add a new <code>$photo</code> property to store the temporary file upload and use the <code>WithFileUploads</code> trait from Livewire itself, as described in its docs.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use Livewire\WithFileUploads; // [tl! highlight]

            new class extends Component {
                use Toast, WithFileUploads; // [tl! highlight]

                ...

                #[Rule('nullable|image|max:1024')] // [tl! highlight:1]
                public $photo;
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Now, let's add the cool <code>x-file</code> component. In this case, we are using its default slot to display an image instead of the default browser's file input field.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-form wire:submit="save">
                <x-file label="Avatar" wire:model="photo" accept="image/png, image/jpeg"> <!-- [tl! highlight:2] -->
                    <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 rounded-lg" />
                </x-file>

                <x-input label="Name" ... />
                ...
            </x-form>
        @endverbatim
    </x-code>

    <p>
        As you can see above, we display a generic image as a placeholder if the user doesn't have an avatar.
        We stored it for you at <code>your-app/public/empty-user.jpg</code> during the Bootcamp setup.
    </p>

    <img src="/bootcamp/04-hh.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        If you select an image and hit "Save" <strong>of course the image won't be uploaded.</strong> There are certainly many ways to do it, but here is a way to get started.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
        public function save()
        {
            $data = $this->validate();

            $this->user->update($data);

            // Upload file and save the avatar `url` on User model
            if ($this->photo) { // [tl! highlight:3]
                $url = $this->photo->store('users', 'public');
                $this->user->update(['avatar' => "/storage/$url"]);
            }

            $this->success('User updated.', redirectTo: '/users');
        }
    @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        <strong>It works! </strong>
    </p>

    <p>
        And how about cropping the avatar image?
    </p>

    <img src="/bootcamp/04-hhh.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        First, add Cropper.js.
    </p>

    <x-code no-render>
        @verbatim('docs')
            {{--  /resources/views/components/layouts/app.blade.php --}}

            <head>
                ...
                {{-- Cropper.js --}}
                <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
            </head>
        @endverbatim
    </x-code>

    <p>
        Then you can use the <code>crop-after-change</code> property <strong>and you are done!</strong>
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-file ... crop-after-change>
        @endverbatim
    </x-code>

    <x-anchor title="Better layout" size="text-xl" class="mt-14" />

    <p>
        That previous form we built looks a bit ugly because all the default components use the full width available on the screen. Here is a dirty trick we use on all maryUI
        demos.
        Just place a nice image on the right side.
    </p>

    <img src="/bootcamp/04-b.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <x-code no-render>
        @verbatim('docs')
            <div>
                <x-header title="Update {{ $user->name }}" separator />

                <!-- Grid stuff from Tailwind -->
                <div class="grid gap-5 lg:grid-cols-2"> <!-- [tl! highlight:1] -->
                    <div>
                        <x-form wire:submit="save">
                            ...
                            <x-slot:actions>
                                ...
                            </x-slot:actions>
                        </x-form>
                    </div>  <!-- [tl! highlight:5] -->
                    <div>
                        {{-- Get a nice picture from `StorySet` web site --}}
                        <img src="/edit-form.png" width="300" class="mx-auto" />
                    </div>
                </div>
            </div>
        @endverbatim
    </x-code>

    <x-anchor title="Choices component" size="text-xl" class="mt-14" />

    <x-button label="Choices docs" link="/docs/components/choices" icon="o-link" external class="btn-sm !no-underline" />

    <img src="/bootcamp/04-i.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        This component is intended to be used for building complex selection interfaces for single and multiple values. It also supports a frontend or server values
        <strong>search</strong>.
    </p>

    <p>
        Remember that in our data model we have a <strong>many-to-many</strong> relationship between <code>User</code> and
        <code>Language</code>.
    </p>

    <p>
        Let's adjust our component:
    </p>
    <ul>
        <li>Add a new property <code>$my_languages</code> to hold the selected languages.</li>
        <li>Fill <code>$my_languages</code> with the user languages using the <code>mount()</code> method.</li>
        <li>Adjust the <code>save()</code> method to store the multi selection.</li>
        <li>Add an extra property <code>languages</code> to list all available languages.</li>
    </ul>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use App\Models\Language; //[tl! highlight]
            ...

            new class extends Component {
                ...

                // Selected languages [tl! highlight:2]
                #[Rule('required')]
                public array $my_languages = [];

                ...

                public function mount(): void
                {
                    $this->fill($this->user);

                    // Fill the selected languages property [tl! highlight:1]
                    $this->my_languages = $this->user->languages->pluck('id')->all();
                }

                public function save()
                {
                    ...
                    $this->user->update($data);

                    // Sync selection [tl! highlight:1]
                    $this->user->languages()->sync($this->my_languages);
                    ...
                }


                public function with(): array
                {
                    return [
                    'countries' => Country::all(),
                    'languages' => Language::all(), // Available Languages [tl! highlight]
                    ];
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        On blade section we will use the <code>x-choices-offline</code> component variation to easily implement a multi selection feature.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-select label="Country" ... />

            {{-- Multi selection [tl! highlight:5   ]--}}
            <x-choices-offline
                label="My languages"
                wire:model="my_languages"
                :options="$languages"
                searchable />
        @endverbatim
    </x-code>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Pro tip: for larger lists use the <code>x-choices</code> component variation.
    </x-alert>

    <x-anchor title="Rich Text Editor component" size="text-xl" class="mt-14" />

    <x-button label="Rich Text Editor docs" link="/docs/components/editor" icon="o-link" external class="btn-sm !no-underline" />

    <img src="/bootcamp/04-j.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        This component is a wrapper around <a href="https://www.tiny.cloud" target="_blank">TinyMCE,</a> and it automatically uploads images and files to <strong>local</strong>
        or <strong>S3</strong> disks.
    </p>

    <p>
        Create an account on the TinyMCE website and replace <code>YOUR-KEY-HERE</code> with your key in the url below. Also remember to add your local address on the allowed
        domains list.
    </p>

    <x-code no-render>
        @verbatim('docs')
            {{--  /resources/views/components/layouts/app.blade.php --}}

            <head>
                ...
                {{-- TinyMCE --}}
                <script src="https://cdn.tiny.cloud/1/YOUR-KEY-HERE/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            </head>
        @endverbatim
    </x-code>

    <p>
        Add a <code>$bio</code> property in the component, since we added the <code>users.bio</code> column during the Bootcamp setup.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            new class extends Component {
                ...
                // Optional [tl! highlight:2]
                #[Rule('sometimes')]
                public ?string $bio = null;
                ...
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        And easily add the <code>x-editor</code> component.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-choices-offline ... />
            <x-editor wire:model="bio" label="Bio" hint="The great biography" /> {{-- [tl! highlight]--}}
        @endverbatim
    </x-code>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Uploading images only works for <strong>authenticated users</strong> on your app. We will implement it on last section of the Bootcamp.
    </x-alert>

    <x-anchor title="Better layout (2)" size="text-xl" class="mt-14" />

    <p>
        If you have a massive amount of fields, another trick is to create sections using Tailwind grid classes, like the example below, for clear group related information.
        This is just another alternative, so use the one that works best for you.
    </p>

    <img src="/bootcamp/04-e.png" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <x-code no-render>
        @verbatim('docs')
            <div>
                <x-header title="Update {{ $user->name }}" separator />

                <x-form wire:submit="save">
                    {{--  Basic section [tl! highlight:20] --}}
                    <div class="lg:grid grid-cols-5">
                        <div class="col-span-2">
                            <x-header title="Basic" subtitle="Basic info from user" size="text-2xl" />
                        </div>
                        <div class="col-span-3 grid gap-3">
                            ... {{-- some fields here --}}
                        </div>
                    </div>

                    {{--  Details section --}}
                    <hr class="my-5 border-base-300" />

                    <div class="lg:grid grid-cols-5">
                        <div class="col-span-2">
                            <x-header title="Details" subtitle="More about the user" size="text-2xl" />
                        </div>
                        <div class="col-span-3 grid gap-3">
                            ... {{-- another fields here --}}
                        </div>
                    </div>

                    <x-slot:actions>
                        ... {{-- form actions --}}
                    </x-slot:actions>
                </x-form>
            </div>
        @endverbatim
    </x-code>

    <x-anchor title="Display the avatar on Table component" size="text-xl" class="mt-14" />

    <x-button label="Avatar docs" link="/docs/components/avatar" icon="o-link" external class="btn-sm !no-underline" />

    <img src="/bootcamp/04-c.png" class="rounded-lg border border-base-300 shadow mt-5 border-dashed" />

    <p>
        Move back to <code>users/index</code> and add a new column in the <code>$headers</code> property.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            ['key' => 'avatar', 'label' => '', 'class' => 'w-1'], // [tl! add]
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
        @endverbatim
    </x-code>

    <p>
        Now, let's customize the table rows with the special <code>&#64;scope</code> directive. You can place anything here, check Table docs for more.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <x-table ... >
                @scope('cell_avatar', $user)                                                    <!-- [tl! highlight:2] -->
                    <x-avatar image="{{ $user->avatar ?? '/empty-user.jpg' }}" class="!w-10" />
                @endscope
            </x-table>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Challenge" size="text-xl" class="mt-14" />

    <p>
        We will not show you the <code>users/create</code> component because it is pretty much the same as <code>users/edit</code>, right?
    </p>

    <p>
        Put a "create" button now and go ahead and implement it!
    </p>

    <img src="/bootcamp/04-d.png" class="rounded-lg border border-base-300 border-dashed shadow" />

    <x-code no-render>
        @verbatim('docs')
            <x-slot:actions>
                <x-button label="Filters" ... />
                <x-button label="Create" link="/users/create" responsive icon="o-plus" class="btn-primary" />   <!-- [tl! highlight] -->
            </x-slot:actions>
        @endverbatim
    </x-code>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Before proceeding, we recommend that you make a local commit to keep track of what is going on.
    </x-alert>

    <div class="flex justify-between mt-10">
        <x-button label="List users" link="/bootcamp/03" icon="o-arrow-left" class="!no-underline btn-ghost" />
        <x-button label="Spotlight" link="/bootcamp/05" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>
</div>
