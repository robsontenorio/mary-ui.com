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

    <x-anchor title="Requirements" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Make sure you a have a <strong>fresh Laravel 11</strong> project up and running on your browser, <strong>without any starter kit</strong>.
        Yes, you can use maryUI with Jetstream/Breeze on your own projects, but let's keep things simple for now and start from the ground.
    </p>

    <ul>
        <li>Fresh Laravel 11 project up and running.</li>
        <li>No starter kit.</li>
        <li>SQLite database.</li>
        <li>Be comfortable with Livewire.</li>
    </ul>

    <x-code no-render language="bash">
        laravel new myapp
    </x-code>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Before proceed, we recommend to make a local commit on each step to keep track what is going on.
    </x-alert>

    <x-anchor title="Install maryUI" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Make sure you have selected <strong>"Volt"</strong> during the installing.
    </p>

    <x-code no-render language="bash">
        composer require robsontenorio/mary

        php artisan mary:install
    </x-code>

    <p>
        Then, start the dev server.
    </p>

    <x-code no-render language="bash">
        yarn dev # or `npm run dev`
    </x-code>

    <p class="mb-10">
        <x-icon name="o-sparkles" class="text-yellow-500 w-7 h-7" />
        <strong>... You are done!</strong>
    </p>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        It is time to commit.
    </x-alert>

    <img src="/bootcamp/02-a.png" class="rounded-lg border p-5" />

    <x-anchor title="Improving the example" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You have a basic working example, but the <strong>data is hardcoded</strong>. So, let's make it work with a real database and add some new models and relationships:
    </p>

    <ul>
        <li>Create a new <code>Country</code> model.</li>
        <li>Create a new <code>Language</code>model.</li>
        <li>Create a <code>User</code> belongs to <code>Country</code> relationship.</li>
        <li>Create a <code>User</code> many-to-many <code>Language</code> relationship.</li>
        <li>Create respective migrations/factories/seeders.</li>
        <li>Random seed the database with users, countries, languages and its relationships.</li>
    </ul>

    <img src="/bootcamp/02-b.png" class="rounded-lg mt-5" />

    <p>
        The above part has nothing to do with maryUI. So, we have created a command to do it for you and speed up things. After run, check the source code diff.
    </p>

    <x-code no-render language="bash">
        php artisan mary:bootcamp
    </x-code>

    <p>
        If you hit the browser again, of course, <strong>nothing has changed</strong>. On next topic we will work on that component.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Commit it again.
    </x-alert>

    <div class="text-right mt-10">
        <x-button label="List users" link="/bootcamp/03" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>

</div>
