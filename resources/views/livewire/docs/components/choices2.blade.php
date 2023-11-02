<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Choices')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI full featured Choices component with searchable, multi-selection support and customizable slots.'])]
class extends Component {
    #[Rule('required')]
    public ?int $user_id = 1;

    #[Rule('required')]
    public array $users_multi_ids = [3, 4];

    #[Rule('required')]
    public int $user_custom_id = 1;

    #[Rule('required')]
    public ?int $user_searchable_id = null;

    #[Rule('required')]
    public array $users_multi_searchable_ids = [];

    #[Rule('required')]
    public int $user_custom_slot_id = 1;

    public Collection $users;

    public Collection $usersSearchable;

    public Collection $usersMultiSearchable;

    public function mount()
    {
        // For NOT SEARCHABLE examples, static list
        $this->users = User::take(4)->get();

        // Single searchable
        $this->search();

        // Multiple Searchable
        $this->searchMulti();
    }

    public function save()
    {
        $this->validate();
    }

    // For single searchable
    public function search(string $value = '')
    {
        // Besides the search results, you must include on demand selected options
        $selectedOptions = User::where('id', $this->user_searchable_id)->orderBy('name')->get();

        $this->usersSearchable = User::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($selectedOptions);     // <-- Adds selected option
    }

    // For multi searchable
    public function searchMulti(string $value = '')
    {
        // Besides the search results, you must include on demand selected options
        $selectedOptions = User::whereIn('id', $this->users_multi_searchable_ids)->orderBy('name')->get();

        $this->usersMultiSearchable = User::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($selectedOptions);     // <-- Adds selected options
    }
}
?>

<div class="docs">
    <x-anchor title="Choices (Rework WIP)" />

    <p>
        This component is intended to be used to build complex selection interfaces for single and multiple values. It also supports <strong>async search</strong> when dealing with
        large lists.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Most of time you just need a simple <a href="/docs/components/select" wire:navigate>Select</a> component, which renders nice natively on every device.
    </x-alert>

    <x-anchor title="Selection" size="text-2xl" class="mt-10 mb-5" />

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
            {{-- Notice `single` --}}
            <x-choices2 label="Single" wire:model="user_id" :options="$users" single />

            {{-- public array $usersC_ids = []; --}}
            <x-choices2 label="Multiple" wire:model="users_multi_ids" :options="$users" />

            {{-- Custom options --}}
            <x-choices2
                label="Custom options"
                wire:model="user_custom_id"
                :options="$users"
                option-label="username"
                option-sub-label="city.name"
                option-avatar="other_avatar"
                icon="o-users"
                hint="It has custom options"
                single />
        @endverbatim
    </x-code>

    <x-anchor title="Searchable" size="text-2xl" class="mt-10 mb-5" />

    <p>
        When dealing with large options list use <code>searchable</code> parameter. By default, it calls <code>search()</code> method to get fresh options while typing.
        You can change the method's name by using <code>search-function</code> parameter.
    </p>

    <x-code class="grid gap-5">
        @verbatim('docs')
            @php                                                            // [tl! .docs-hide]
                    $usersSearchable = $this->usersSearchable;              // [tl! .docs-hide]
                    $usersMultiSearchable = $this->usersMultiSearchable;    // [tl! .docs-hide]
            @endphp                                                         {{-- [tl! .docs-hide] --}}
            {{-- Notice `searchable` + `single` --}}
            <x-choices2
                label="Searchable - Single"
                wire:model="user_searchable_id"
                :options="$usersSearchable"
                single
                searchable />

            {{-- Notice custom `search-function` --}}
            <x-choices2
                label="Searchable - Multiple"
                wire:model="users_multi_searchable_ids"
                :options="$usersMultiSearchable"
                search-function="searchMulti"
                no-result-text="Ops! Nothing here ..."
                searchable />
        @endverbatim
    </x-code>

    <p>
        You must also consider displaying pre-selected items on list, when it <strong>first renders</strong> and <strong>while searching</strong>.
        There are many approaches to make it work, but here is an example for <strong>single search using Volt.</strong>
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            class extends Component {
                #[Rule('required')]
                public ?int $user_searchable_id = null;

                public function mount()
                {
                    // Fill options when component first renders
                    $this->search();
                }

                // Also called as you type
                public function search(string $value = '')
                {
                    // Besides the search results, you must include on demand selected options
                    $selectedOptions = User::where('id', $this->user_searchable_id)->orderBy('name')->get();

                    $this->usersSearchable = User::query()
                        ->where('name', 'like', "%$value%")
                        ->take(5)
                        ->orderBy('name')
                        ->get()
                        ->merge($selectedOptions);     // <-- Adds selected option
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Slots" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You have full control on rendering items by using the <code>&#x40;scope('item', $object)</code> special blade directive.
        It injects the current <code>$object</code> from the loop's context and achieves the same behavior that you would expect from the Vue/React scoped slots.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            <div>                                       <!-- [tl! .docs-hide] -->
                @php $users = $this->users @endphp      <!-- [tl! .docs-hide] -->
            </div>                                      <!-- [tl! .docs-hide] -->
            <x-choices2 label="Slots" wire:model="user_custom_slot_id" :options="$users" single>
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
            </x-choices2>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}
</div>
