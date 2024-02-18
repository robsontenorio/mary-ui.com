<?php

use App\Models\City;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Mary\Traits\WithMediaSync;

new #[Layout('components.layouts.landing')] class extends Component {
    use WithFileUploads, WithMediaSync, WithPagination;

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

    public array $selected_cities = [];

    public array $selected = [1, 3];

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public array $expanded = [];

    public bool $showDrawer = false;

    public bool $myModal = false;

    public string $text = '<p>It automatically upload images using <b>local</b> or <b>S3</b> disks.</p>';

    public function mount()
    {
        // TinyMCE (image upload)
        if (! auth()->user()) {
            auth()->login(User::inRandomOrder()->first());
        }

        // Image Library
        $this->users = User::take(4)->get();
        $this->user = User::inRandomOrder()->first();
        $this->library = new Collection();

        // Choices
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

<div class="docs landing">
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
                {{--                <x-button label="Bootcamp" icon-right="o-code-bracket" link="/bootcamp/01" class="btn-neutral !no-underline" />--}}
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
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-box pt-10 px-8 pb-4 ">
                    <kbd class="kbd">Ctrl/Cmd</kbd> <span class="text-base-100">+</span> <kbd class="kbd">G</kbd>
                    <p class="text-base-100">Search for "a" to see what kind of content it returns.</p>
                </div>
            </div>
            <div>
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-box p-10 " id="image-library-landing-demo">
                    <x-image-library
                        wire:model="files"
                        wire:library="library"
                        :preview="$library"
                        hint="Images | Max 100Kb" />
                </div>
            </div>
            <div>
                <div class="bg-gradient-to-tr from-indigo-500 via-purple-50-200 to-pink-500 p-3.5 rounded-box">
                    <x-editor wire:model="text" :config="['height' => 150, 'plugins' => 'autoresize']" />
                </div>
            </div>
        </div>
    </div>

    <div class="px-5 lg:px-20 pt-20 bg-base-200/50 rounded-box">
        <div class="font-extrabold text-4xl pt-10 text-right">
            Delightful demos.
        </div>

        <div class="mt-10 pb-24 grid lg:grid overflow-x-auto lg:grid-cols-3 gap-16 p-10">

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

            {{--   FLOW DEMO  --}}
            <div>
                <div class="mockup-browser  bg-base-300 transition-all shadow-xl">
                    <div class="mockup-browser-toolbar"></div>
                    <div class="blur-sm">
                        <img src="/flow-demo.png" />
                    </div>
                </div>
                <div class="mt-5">
                    <x-header title="Flow" subtitle="The dashboard demo (coming soon)." size="text-xl" />
                </div>
            </div>
        </div>
    </div>

    <div class="px-5 lg:px-20 py-20">
        <div class="font-extrabold text-4xl py-10">
            Lists
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
            Multi selection
        </div>

        <x-code side-by-side invert render-col-span="6" code-col-span="6" class="grid gap-5">
            @verbatim('docs')
                @php                              // [tl! .docs-hide]
                    $users = $this->users;       // [tl! .docs-hide]
                @endphp                         {{-- [tl! .docs-hide] --}}
                <x-choices
                    label="Users - server side"
                    wire:model="selected_users"
                    :options="$users"
                    icon="s-bolt"
                    hint="Search happens on server side"
                    searchable />
            @endverbatim
        </x-code>

        <hr class="my-12" />

        <x-code side-by-side invert render-col-span="6" code-col-span="6" class="grid gap-5">
            @verbatim('docs')
                @php                                    // [tl! .docs-hide]
                    $cities = App\Models\City::all();   // [tl! .docs-hide]
                @endphp                                 {{-- [tl! .docs-hide] --}}
                <x-choices-offline
                    label="Cities - frontend side"
                    wire:model="selected_cities"
                    :options="$cities"
                    icon="s-bolt-slash"
                    hint="Search happens on frontend side"
                    searchable />
            @endverbatim
        </x-code>
    </div>

    <div class=" px-5 lg:px-20 py-20">
        <div class="font-extrabold text-4xl py-10">
            Forms.
        </div>

        <x-code side-by-side render-col-span="5" code-col-span="7">
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

    <div class="px-5 lg:px-20 pt-10 pb-20 bg-base-200/50 rounded-box">
        <div class="font-extrabold text-4xl pt-10 pb-20 text-right">
            Drawer & Modal
        </div>

        <x-code side-by-side invert render-col-span="3" code-col-span="9">
            @verbatim('docs')
                @php                                    // [tl! .docs-hide]
                    $showDrawer = $this->showDrawer;    // [tl! .docs-hide]
                @endphp                                 {{-- [tl! .docs-hide] --}}
                <x-button label="Open Drawer" wire:click="$toggle('showDrawer')" class="btn-primary btn-block" />

                <x-drawer wire:model="showDrawer" title="Hello!" with-close-button separator class="lg:w-1/3">
                    <div>Click outside, on `CANCEL` button or `CLOSE` icon to close.</div>

                    <x-slot:actions>
                        <x-button label="Cancel" wire:click="$toggle('showDrawer')" />
                        <x-button label="Confirm" class="btn-primary" />
                    </x-slot:actions>
                </x-drawer>
            @endverbatim
        </x-code>

        <hr class="my-12" />

        <x-code side-by-side invert render-col-span="3" code-col-span="9">
            @verbatim('docs')
                @php                                    // [tl! .docs-hide]
                    $myModal = $this->myModal;    // [tl! .docs-hide]
                @endphp                                 {{-- [tl! .docs-hide] --}}
                <x-button label="Open Modal" wire:click="$toggle('myModal')" class="btn-warning btn-block" />

                <x-modal wire:model="myModal" title="Hello" subtitle="Livewire example" separator>
                    <div>Click outside, press `ESC` or click `CANCEL` button to close.</div>

                    <x-slot:actions>
                        <x-button label="Cancel" wire:click="$toggle('myModal')" />
                        <x-button label="Confirm" class="btn-primary" />
                    </x-slot:actions>
                </x-modal>
            @endverbatim
        </x-code>
    </div>

    <div class="px-5 lg:px-20 py-20 rounded-box">
        <div class="font-extrabold text-4xl py-10">
            Easy Tables.
        </div>

        {{--@formatter:off--}}
        <x-code side-by-side render-col-span="5" code-col-span="7" class="grid gap-5">

            @verbatim('docs')
                @php
                    use App\Models\User; // [tl! .docs-hide]
                    $users = User::with('city')->take(4)->get();

                    $headers = [
                        ['key' => 'id', 'label' => '#', 'class' => 'w-1 bg-yellow-50'], # <-- CSS
                        ['key' => 'name', 'label' => 'Nice Name', 'class' => 'hidden lg:table-cell'], # <-- responsive
                        ['key' => 'city.name', 'label' => 'City']   # <-- nested object
                    ];
                @endphp

                <x-table :rows="$users" :headers="$headers" striped />
            @endverbatim
        </x-code>
        {{--@formatter:on--}}
    </div>

    <div class="px-5 lg:px-20 py-20 bg-base-200/50 rounded-box">
        <div class="font-extrabold text-4xl py-10">
            Full Tables.
        </div>

        {{--@formatter:off--}}
        <x-code>
            @verbatim('docs')
                @php
                    use App\Models\User; // [tl! .docs-hide]
                    // public array $expanded = [];
                    // public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

                    $sortBy = $this->sortBy;        // [tl! .docs-hide]
                    $expanded = $this->expanded;    // [tl! .docs-hide]
                    $users = User::with('city')
                                ->orderBy(...array_values($this->sortBy))
                                ->paginate(3);

                    $headers = [
                        ['key' => 'id', 'label' => '#', 'class' => 'w-1'], # <-- CSS
                        ['key' => 'name', 'label' => 'Nice Name'],
                        ['key' => 'username', 'label' => 'Username', 'class' => 'hidden lg:table-cell'], # <--- responsive
                        ['key' => 'city.name', 'label' => 'City', 'sortable' => false, 'class' => 'hidden lg:table-cell']   # <-- nested object
                    ];

                    $cell_decoration = [
                        'name' => [
                            'bg-yellow-50 italic' => fn(User $user) => Str::of($user->name)->startsWith('A')
                        ]
                    ];
                @endphp

                <x-table
                    wire:model="expanded"
                    :headers="$headers"
                    :rows="$users"
                    :cell-decoration="$cell_decoration"
                    :sort-by="$sortBy"
                    link="/docs/components/table?user_id={id}&city={city.name}"  {{-- Make rows clickables --}}
                    expandable
                    with-pagination
                >
                    {{--  Expansion slot --}}
                    @scope('expansion', $user)
                        <div class="border border-dashed rounded-lg p-5 ">
                            Hello, {{ $user->name }}!
                        </div>
                    @endscope

                    {{-- Actions Slot --}}
                    @scope('actions', $user)
                        <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner />
                    @endscope

                    {{-- Cell scope --}}
                    @scope('cell_username', $user)
                        <x-badge :value="$user->username" class="badge-primary" />
                    @endscope
                </x-table>
            @endverbatim
        </x-code>
        {{--@formatter:on--}}
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
