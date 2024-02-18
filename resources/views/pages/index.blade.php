<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;

new #[Layout('components.layouts.landing')] class extends Component {
    use WithFileUploads, WithMediaSync;

    #[Rule(['files.*' => 'image|max:100'])]
    public array $files = [];

    #[Rule('required')]
    public Collection $library;

    #[Rule('required|min:10')]
    public string $name = '';

    #[Rule('required|decimal:0,2|gt:0')]
    public string $amount;

    public Collection $users;

    public User $user;

    public array $selected_users = [];

    public array $selected = [1, 3];

    public function mount()
    {
        $this->users = User::take(4)->get();
        $this->user = User::inRandomOrder()->first();
        $this->library = new Collection();

        $this->search();
    }

    public function save()
    {
        sleep(1);
        $this->validate();
    }

    public function delete()
    {
        sleep(1);
    }

    public function search(?string $term = '')
    {
        $selectedOptions = User::whereIn('id', $this->selected_users)->orderBy('name')->get();

        $this->users = User::query()
            ->where('name', 'like', "%{$term}%")
            ->orderBy('name')
            ->take(4)
            ->get()
            ->merge($selectedOptions);
    }
}

?>

<div class="docs">
    <div class="bg-gradient-to-r from-white via-purple-50 to-white dark:bg-none dark:bg-base-200 -mt-32 pt-52 pb-32 px-5 lg:px-20 rounded-box">
        <div class="text-center">
            <div class="flex gap-5 justify-center items-center my-10">
                <img src="/laravel.png" class="w-12 h-12" />
                <img src="/livewire.png" class="w-13 h-11" />
                <img src="/tailwind.png" class="w-13 h-11" />
                <img src="/daisy.png" class="w-9 h-12" />
            </div>

            <div class="text-xl leading-10 lg:text-4xl lg:leading-relaxed">
                Gorgeous <span class="underline decoration-green-400  rounded  font-bold">Laravel Blade UI Components</span>
                <br>made for <span class="underline decoration-yellow-400  rounded  font-bold">Livewire 3</span>
                and styled around <span class="underline decoration-sky-400  rounded  font-bold">daisyUI + Tailwind</span>
            </div>

            <div class="mt-10 flex gap-3 justify-center">
                <x-button label="Bootcamp" icon-right="o-code-bracket" link="/bootcamp/01" class="btn-neutral !no-underline" />
                <x-button label="Installation" icon-right="o-arrow-right" link="/docs/installation" class="bg-purple-500 hover:bg-purple-700 text-white !no-underline" />
            </div>
        </div>
    </div>

    <div class="px-5 lg:px-20 py-20">
        <div class="font-extrabold text-4xl py-10">
            Amazing components.
        </div>

        <div class="grid lg:grid-cols-2 gap-x-16 gap-y-8">
            <div>
                <p>
                    <span class="text-xl font-medium">Image Gallery</span> <br>
                </p>

                @php
                    $images = [
                        'https://daisyui.com/images/stock/photo-1572635148818-ef6fd45eb394.jpg',
                        'https://daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.jpg',
                        'https://daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.jpg',
                        'https://daisyui.com/images/stock/photo-1494253109108-2e30c049369b.jpg',
                        'https://daisyui.com/images/stock/photo-1550258987-190a2d41a8ba.jpg',
                    ]
                @endphp

                <x-image-gallery :images="$images" class="h-40 rounded-box" />
            </div>
            <div>
                <p>
                    <span class="text-xl font-medium">Spotlight</span><br>
                </p>
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-box p-5 pb-8 ">
                    <p class="text-base-100">Search for "a" to see what kind of content it returns.</p>
                    <kbd class="kbd">Ctrl/Cmd</kbd> <span class="text-base-100">+</span> <kbd class="kbd">G</kbd>
                </div>
            </div>
            <div>
                <p>
                    <span class="text-xl font-medium">Image Library</span> <br>
                </p>

                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-box p-5 pb-8 " id="image-library-landing-demo">
                    <x-image-library
                        wire:model="files"
                        wire:library="library"
                        :preview="$library"
                        label="Product images"
                        hint="Images | Max 100Kb" />
                </div>
            </div>
            <div>
                <p>
                    <span class="text-xl font-medium">Everything you need...</span> <br>
                </p>
                <div class="bg-gradient-to-tr from-indigo-500 via-purple-50-200 to-pink-500 gap-5 p-8 py-12 rounded-box overflow-x-auto flex items-center justify-between">
                    <div class="font-black text-base-100">
                        <span class="text-4xl">39</span><br>
                        beautiful components
                    </div>
                    <x-button label="LET`S DO IT" icon-right="o-arrow-right" link="/docs/installation" class="!no-underline btn-outline text-base-100" />
                </div>
            </div>
        </div>
    </div>

    <div class="px-5 lg:px-20 pb-24 pt-10 bg-base-200/50 rounded-box">
        <div class="font-extrabold text-4xl py-10 text-right">
            Delightful demos.
        </div>

        <div class="grid lg:grid-cols-2 mt-10 gap-24 items-center overscroll-x-auto">

            {{--   PAPER DEMO  --}}
            <div>
                <div class="mockup-browser  bg-base-300 cursor-pointer hover:scale-105 transition-all shadow-xl">
                    <div class="mockup-browser-toolbar"></div>
                    <a href="https://paper.mary-ui.com" target="_blank">
                        <img src="/paper-demo.png" />
                    </a>
                </div>
                <div class="mt-5">
                    <x-header title="Paper" subtitle="The elegant and minimalist demo." size="text-xl" />
                </div>
            </div>

            {{--   ORANGE DEMO  --}}
            <div>

                <div class="mockup-browser  bg-base-300 cursor-pointer hover:scale-105 transition-all shadow-xl">
                    <div class="mockup-browser-toolbar"></div>
                    <div>
                        <a href="https://orange.mary-ui.com" target="_blank">
                            <img src="/orange-demo.png" />
                        </a>
                    </div>
                </div>
                <div class="mt-5">
                    <x-header title="Orange" subtitle="The refreshing storefront demo." size="text-xl" />
                </div>

            </div>

        </div>
    </div>

    <div class="px-5 lg:px-20 py-20">
        <div class="font-extrabold text-4xl py-10">
            Less code, more action.
        </div>

        <x-code side-by-side render-col-span="4" code-col-span="8">
            @verbatim('docs')
                @php
                    $users = App\Models\User::take(3)->get();
                @endphp

                @foreach($users as $user)
                    <x-list-item :item="$user" sub-value="username" link="/docs/installation">
                        <x-slot:actions>
                            <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner />
                        </x-slot:actions>
                    </x-list-item>
                @endforeach
            @endverbatim
        </x-code>
    </div>

    <div class="px-5 lg:px-20 py-20 bg-base-200/50 rounded-box">
        <div class="font-extrabold text-4xl py-10 text-right">
            It. Just. Works.
        </div>

        <x-code side-by-side render-col-span="6" code-col-span="6" class="grid gap-5">
            @verbatim('docs')
                @php                              // [tl! .docs-hide]
                    $users = $this->users;   // [tl! .docs-hide]
                @endphp                         {{-- [tl! .docs-hide] --}}
                <x-choices
                    label="Searchable"
                    wire:model="selected_users"
                    :options="$users"
                    searchable />
            @endverbatim
        </x-code>
    </div>

    <div class=" px-5 lg:px-20 py-20">
        <div class="font-extrabold text-4xl py-10">
            Forms.
        </div>

        <x-code side-by-side invert render-col-span="5" code-col-span="7">
            @verbatim('docs')
                <x-form wire:submit="save">
                    <x-input label="Name" wire:model="name" icon="o-user" placeholder="Hello" />
                    <x-input label="Amount" wire:model="amount" prefix="USD" money />

                    <x-slot:actions>
                        <x-button label="Cancel" />
                        <x-button label="Save" class="btn-primary" type="submit" spinner="save" />
                    </x-slot:actions>
                </x-form>
            @endverbatim
        </x-code>
    </div>

    <div class="px-5 lg:px-20 py-20 bg-base-200/50 rounded-box">
        <div class="font-extrabold text-4xl py-10 text-right">
            Tables.
        </div>

        <x-code side-by-side render-col-span="5" code-col-span="7">
            @verbatim('docs')
                @php
                    // public array $selected = [1, 3];

                    $users = App\Models\User::with('city')->take(5)->get();

                    $headers = [
                        ['key' => 'id', 'label' => '#', 'class' => 'text-red-400'], # <-- css
                        ['key' => 'name', 'label' => 'Nice Name'],
                        ['key' => 'city.name', 'label' => 'City']   # <-- nested object
                    ];
                @endphp

                {{-- See console ouput --}}
                {{-- You can use any `$wire.METHOD` on `@row-xxxx` --}}
                <x-table
                    :headers="$headers"
                    :rows="$users"
                    striped
                    selectable
                    wire:model="selected"
                    @row-click="console.log($event.detail)"
                    @row-selection="console.log($event.detail)" />
            @endverbatim
        </x-code>
    </div>

    <div class="my-20 text-center">

        <div class="font-extrabold text-4xl bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-box py-16 text-base-100 flex items-center justify-center gap-5">
            And more ...

            <x-button label="LET`S DO IT" icon-right="o-arrow-right" link="/docs/installation" class="!no-underline btn-outline text-base-100" />

        </div>
    </div>

    <div class="docs">
        <x-spotlight />
    </div>
</div>
