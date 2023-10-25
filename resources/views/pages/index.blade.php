<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new #[Layout('components.layouts.landing')] class extends Component {
    #[Rule('required|min:10')]
    public string $name = '';

    #[Rule('required|decimal:0,2|gt:0')]
    public string $amount;

    public Collection $users;

    public array $selected_users = [];

    public array $selected = [1, 3];

    public function mount()
    {
        $this->users = User::take(4)->get();

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
        $this->users = User::query()
            ->where('name', 'like', "%{$term}%")
            ->orderBy('name')
            ->take(4)
            ->get();
    }
}

?>

<div class="docs">
    <div class="bg-gradient-to-r from-white via-purple-50 to-white dark:bg-none dark:bg-base-200 -mt-20 pt-20 pb-32 px-5 lg:px-20">
        <div class="font-bold text-6xl text-center mb-10 mt-20">
            <span class="font-extrabold">Do more</span>. <span class="font-thin">Code less</span>.
        </div>

        <div class="text-center">

            <div class="flex gap-5 justify-center items-center my-10">
                <img src="/laravel.png" class="w-8 h-8" />
                <img src="/livewire.png" class="w-9 h-7" />
                <img src="/tailwind.png" class="w-9 h-7" />
                <img src="/daisy.png" class="w-6 h-8" />
            </div>

            <div class="text-xl leading-10">
                Gorgeous <span class="underline decoration-green-400  rounded  font-bold">Laravel blade components</span>
                <br>made for <span class="underline decoration-yellow-400  rounded  font-bold">Livewire 3</span>
                and styled around <span class="underline decoration-sky-400  rounded  font-bold">daisyUI + Tailwind</span>
            </div>

            <div class="mt-10">
                <x-button label="GET STARTED" icon-right="o-arrow-right" link="/docs/installation" class="btn-primary !no-underline animate-pulse" />
            </div>
        </div>
    </div>

    <div class="px-5 lg:px-20 pb-20">
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

    <div class="bg-base-200/50  px-5 lg:px-20 py-20">
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

    <div class="px-5 lg:px-20 py-20">
        <div class="font-extrabold text-4xl py-10 text-right">
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

    <div class="bg-base-200/50  px-5 lg:px-20 py-20">
        <div class="font-extrabold text-4xl py-10">
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

    <div class=" text-center">

        <div class="font-extrabold text-4xl py-10">
            And more ...
        </div>

        <x-button label="LET`S DO IT" icon-right="o-arrow-right" link="/docs/installation" class="btn-primary !no-underline animate-pulse" />
    </div>
</div>
