<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Choices')] class extends Component {
    #[Rule('required')]
    public ?int $user1_id = null;

    #[Rule('required')]
    public ?int $user2_id = null;

    #[Rule('required')]
    public ?int $user3_id = null;

    #[Rule('required')]
    public ?int $user4_id = null;

    #[Rule('required')]
    public ?int $user5_id = null;

    #[Rule('required')]
    public array $users_multiple = [];

    #[Rule('required')]
    public array $users_multiple_searchable = [];

    public Collection $users;

    public Collection $usersExampleSingleSearch;

    public Collection $usersExampleMultiSearch;

    public function mount()
    {
        $this->users = User::take(4)->get();

        $this->search();
        $this->otherSearch();
    }

    public function save()
    {
        $this->validate();
    }

    public function search(?string $term = '')
    {
        $this->usersExampleSingleSearch = User::query()
            ->where('name', 'like', "%{$term}%")
            ->orderBy('name')
            ->take(4)
            ->get();
    }

    public function otherSearch(?string $term = '')
    {
        $this->usersExampleMultiSearch = User::query()
            ->where('name', 'like', "%{$term}%")
            ->orderBy('name')
            ->take(4)
            ->get();
    }
}

?>

<div class="docs">
    <x-header title="Choices" with-anchor />

    <p>
        This component is intended to be used to build complex selection interface for single and multiple values. It also supports <strong>async search</strong> when dealing with
        large lists.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Most of time you just need a simple <a href="/docs/components/select" wire:navigate>Select</a> component. It renders nice natively on every device.
    </x-alert>

    <x-header title="Selection" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
        <li><code>$object->avatar</code> for avatar picture.</li>
    </ul>

    <br>

    <x-code class="grid gap-5">
        @verbatim('docs')
            @php                              // [tl! .docs-hide]
                    $users = $this->users;   // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            {{-- Note `single` --}}
            <x-choices label="Simple" wire:model="user1_id" :options="$users" single />

            {{-- public array $users_multiple = []; --}}
            <x-choices label="Multiple" wire:model="users_multiple" :options="$users" />

            {{-- Custom options --}}
            <x-choices
                label="Custom display labels"
                wire:model="user2_id"
                :options="$users"
                option-label="username"
                option-sub-label="city.name"
                option-avatar="other_avatar"
                hint="It has custom display labels"
                single />
        @endverbatim
    </x-code>

    <x-header title="Searchable" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        When dealing with large options list use <code>searchable</code> parameter. By default, it calls <code>search()</code> method to get fresh options while typing.
        You can change the method name by using <code>search-function</code> parameter.
    </p>

    <x-code class="grid gap-5">
        @verbatim('docs')
            @php                                                                    // [tl! .docs-hide]
                    $usersExampleSingleSearch = $this->usersExampleSingleSearch;   // [tl! .docs-hide]
                    $usersExampleMultiSearch = $this->usersExampleMultiSearch;    // [tl! .docs-hide]
            @endphp                                                               {{-- [tl! .docs-hide] --}}
            {{-- Note `searchable` + `single` --}}
            <x-choices
                label="Searchable - Single"
                wire:model="user4_id"
                :options="$usersExampleSingleSearch"
                no-result-text="Nothing here"
                single
                searchable />

            {{-- Note custom `search-function` --}}
            <x-choices
                label="Searchable - Multiple"
                wire:model="users_multiple_searchable"
                :options="$usersExampleMultiSearch"
                search-function="otherSearch"
                no-result-text="Nothing here"
                searchable />
        @endverbatim
    </x-code>

    <p>
        You also must consider display pre-selected items on list.
        There are many approaches to make it work, but here is one to quickly get started for <strong>multiple search.</strong>
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            class ChoicesExample extends Component
            {
                // Selected users
                public array $users_multiple_searchable = [];

                // Result search
                public Collection $usersExampleMultiSearch;

                // Make sure loads items on initial render
                public function mount()
                {
                    $this->search();
                }

                // It is called by <x-choices>
                public function search(string $value = '')
                {
                    // Also load selected users, besides result search
                    $preUsers = User::whereIn('id', $this->users_multiple_searchable)->get();

                    $this->usersExampleMultiSearch = User::query()
                            ->where('name', 'like', "%{$value}%")
                            ->take(4)
                            ->get()
                            ->merge($preUsers); // <--- make it appear on list
                }
            }

        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-header title="Slots" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        You have full control on rendering items by using <code>&#x40;scope('item', $object)</code> slot helper blade directive.
        It injects current <code>$object</code> from loop context and achieves same behavior you expect from Vue/React scoped slots.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            <div>                                       <!-- [tl! .docs-hide] -->
                @php $users = $this->users @endphp      <!-- [tl! .docs-hide] -->
            </div>                                      <!-- [tl! .docs-hide] -->
            <x-choices label="Slots" wire:model="user5_id" :options="$users" single>
                @scope('item', $user)
                    <x-list-item :item="$user" sub-value="bio">
                        <x-slot:avatar>
                            <x-icon name="o-user" class="bg-orange-100 p-2 w-8 h8 rounded-full" />
                        </x-slot:avatar>
                        <x-slot:actions>
                            <x-badge :value="$user->username" />
                        </x-slot:actions>
                    </x-list-item>
                @endscope
            </x-choices>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}
</div>
