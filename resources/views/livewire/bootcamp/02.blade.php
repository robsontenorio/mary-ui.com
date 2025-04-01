<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - Setup')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Setup" />

    <x-anchor title="Requirements" size="text-xl" class="mt-14" />

    <p>
        Make sure you a have a <strong>fresh Laravel 12+</strong> project up and running on your browser, <strong>without any starter kit</strong>.
        Yes, you can use maryUI with Jetstream/Breeze on your own projects, but let's keep things simple for now and start from the ground.
    </p>

    <ul>
        <li>Fresh Laravel 12+ project up and running.</li>
        <li>No starter kit.</li>
        <li>SQLite database.</li>
    </ul>

    <x-code no-render language="bash">
        laravel new myapp
    </x-code>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Before proceeding, make a local commit to keep track of what is going on.
    </x-alert>

    <x-anchor title="Install maryUI" size="text-xl" class="mt-14" />

    <p>
        Make sure you have selected <strong>"Volt"</strong> during this install.
    </p>

    <x-code no-render language="bash">
        composer require robsontenorio/mary

        php artisan mary:install
    </x-code>

    <p>
        Start the dev server.
    </p>

    <x-code no-render language="bash">
        yarn dev
    </x-code>

    <p>
        <x-icon name="o-bolt" class="text-warning" />
        <strong>Check the browser!</strong>
    </p>

    <p>
        We are using Livewire Volt, take a look at:
    </p>
    <ul>
        <li><code>routes/web.php</code></li>
        <li><code>resources/views/livewire/users/index.blade.php</code>.</li>
    </ul>

    <img src="/bootcamp/02-a.png?new=2025" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Check the source code diff and commit it.
    </x-alert>

    <x-anchor title="Improving the example" size="text-xl" class="mt-14" />

    <p>
        You have a basic working example, but the <strong>data is hardcoded</strong>.
        Let's make it work with a real database and add some new models and relationships.
    </p>

    <img src="/bootcamp/02-b.png?new=2025" class="rounded-lg shadow border border-base-300 my-10 border-dashed p-2" />

    <p>
        Creating models has nothing to do with maryUI. So, we have created a command to do it for you and speed things up.
        After running it, it is important to take a <strong>look at the database</strong> to see what is going on.
    </p>

    <x-code no-render language="bash">
        php artisan mary:bootcamp
    </x-code>

    <ul class="my-10">
        <li>Create a new <code>Country</code> model.</li>
        <li>Create a new <code>Language</code>model.</li>
        <li>Create a <code>User</code> belongs to <code>Country</code> relationship.</li>
        <li>Create a <code>User</code> many-to-many <code>Language</code> relationship.</li>
        <li>Create their respective migrations/factories/seeders.</li>
        <li>Randomly seed the database with users, countries, languages and its relationships.</li>
    </ul>

    <p>
        If you hit the browser again, of course, <strong>nothing has changed</strong>. On the next topic we will work on that component.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Before proceeding, make a local commit to keep track of what is going on.
    </x-alert>

    <div class="text-right mt-10">
        <x-button label="Listing users" link="/bootcamp/03" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>

</div>
