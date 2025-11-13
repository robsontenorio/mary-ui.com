<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Choices')]
#[Layout('layouts.app', ['description' => 'Livewire UI full featured Choices component with searchable, multi-selection support and customizable slots.'])]
class extends Component {
    public ?int $user_id = 1;

    public array $users_multi_ids = [3, 4];

    public int $user_custom_id = 1;

    public array $users_all_ids = [2];

    public array $users_all2_ids = [3];

    public array $users_compact_ids = [1];

    public array $users_compact2_ids = [2, 3, 4];

    public array $users_all_compact_ids = [];

    public ?int $user_searchable_id = null;

    public ?int $user_searchable_offline_id = null;

    public ?int $user_searchable_min_chars_id = null;

    public array $users_multi_searchable_ids = [];

    public array $users_multi_searchable_offline_ids = [];

    public int $user_custom_slot_id = 1;

    public int $user_custom_slot_offline_id = 1;

    public Collection $users;

    public Collection $usersSearchable;

    public Collection $usersSearchableMinChars;

    public Collection $usersMultiSearchable;

    public function mount()
    {
        // For NOT SEARCHABLE examples, static list
        $this->users = User::with('city')->take(8)->get();

        // Single searchable
        $this->search();

        // Single searchable (min chars)
        $this->searchMinChars();

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
        // Besides the search results, you must include on demand selected option
        $selectedOption = User::where('id', $this->user_searchable_id)->get();

        $this->usersSearchable = User::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($selectedOption);     // <-- Adds selected option
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

    // For single searchable (min chars)
    public function searchMinChars(string $value = '')
    {
        // Besides the search results, you must include on demand selected options
        $selectedOption = User::where('id', $this->user_searchable_min_chars_id)->orderBy('name')->get();

        $this->usersSearchableMinChars = collect();

        if (strlen($value) >= 2) {
            $this->usersSearchableMinChars = User::query()
                ->where('name', 'like', "%$value%")
                ->take(5)
                ->orderBy('name')
                ->get();
        }

        $this->usersSearchableMinChars = $this->usersSearchableMinChars->merge($selectedOption);     // <-- Adds selected option
    }
}
?>

<div class="docs">
    <x-anchor title="Choices" />

    <p>
        This component is intended to be used to build complex selection interfaces for single and multiple values.
        It also supports <strong>search</strong> on frontend or server, when dealing with large lists.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        <b>Pro tip:</b> Most of time you just need a simple <a href="/docs/components/select" wire:navigate>Select</a> component, which renders nice natively on all devices.
    </x-alert>

    <x-anchor title="Selection" size="text-xl" class="mt-14" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
        <li><code>$object->avatar</code> for avatar picture.</li>
    </ul>

    <br>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                              // [tl! .docs-hide]
                    $users = $this->users;   // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            {{-- Notice `single` --}}
            <x-choices label="Single" wire:model="user_id" :options="$users" single clearable />

            {{-- public array $users_multi_ids = []; --}}
            <x-choices label="Multiple" wire:model="users_multi_ids" :options="$users" clearable />

            {{-- Custom options --}}
            <x-choices
                label="Custom options"
                wire:model="user_custom_id"
                :options="$users"
                option-label="username"
                option-sub-label="city.name"
                option-avatar="other_avatar"
                icon="o-users"
                height="max-h-96" {{-- Default is `max-h-64`  --}}
                hint="It has custom options"
                single />
        @endverbatim
    </x-code-example>

    <x-anchor title="Select All" size="text-xl" class="mt-14" />

    <p>
        This option only works for <strong>multiple and non-searchable</strong> exclusively.
    </p>

    <br>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                              // [tl! .docs-hide]
                    $users = $this->users;   // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            {{-- Notice `allow-all` --}}
            <x-choices label="Multiple" wire:model="users_all_ids" :options="$users" allow-all />

            <x-choices
                label="Multiple"
                wire:model="users_all2_ids"
                :options="$users"
                allow-all
                allow-all-text="Select all stuff"
                remove-all-text="Delete all things" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Compact mode" size="text-xl" class="mt-14" />

    <p>
        This option only works for <strong>multiple and non-searchable</strong> exclusively.
    </p>

    <br>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                              // [tl! .docs-hide]
                    $users = $this->users;   // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            {{-- Notice `compact` --}}
            <x-choices label="Compact" wire:model="users_compact_ids" :options="$users" compact />

            <x-choices
                label="Compact label"
                wire:model="users_compact2_ids"
                :options="$users"
                compact
                compact-text="stuff chosen" />
        @endverbatim
    </x-code-example>

    <br>

    <p>
        You can combine <code>allow-all</code> and <code>compact</code>
    </p>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                              // [tl! .docs-hide]
                    $users = $this->users;   // [tl! .docs-hide]
            @endphp                         {{-- [tl! .docs-hide] --}}
            <x-choices
                label="Select All + Compact"
                wire:model="users_all_compact_ids"
                :options="$users"
                compact
                allow-all />
        @endverbatim
    </x-code-example>

    <x-anchor title="Searchable (frontend)" size="text-xl" class="mt-14" />

    <p>
        If you judge you don't have a huge list of items, you can make it searchable offline on <strong>"frontend side"</strong>.
        But, <strong>if you have a huge list</strong> it is a better idea to make it searchable on <strong>"server side"</strong>,
        otherwise you can face some slow down on frontend. See on the next section.
    </p>

    <br>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                                               // [tl! .docs-hide]
                    $users = $this->users;                    // [tl! .docs-hide]
            @endphp                                           {{-- [tl! .docs-hide] --}}
            {{-- Notice `searchable` --}}
            {{-- Notice this is a different component, but with same API --}}
            <x-choices-offline
                label="Single (frontend)"
                wire:model="user_searchable_offline_id"
                :options="$users"
                placeholder="Search ..."
                single
                clearable
                searchable />

            <x-choices-offline
                label="Multiple (frontend)"
                wire:model="users_multi_searchable_offline_ids"
                :options="$users"
                placeholder="Search ..."
                clearable
                searchable />
        @endverbatim
    </x-code-example>

    <x-anchor title="Searchable (server)" size="text-xl" class="mt-14" />

    <p>
        When dealing with large options list use <code>searchable</code> parameter. By default, it calls <code>search()</code> method to get
        fresh options from <strong>"server side"</strong> while typing.
        You can change the method's name by using <code>search-function</code> parameter.
    </p>

    <br>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                                                                  // [tl! .docs-hide]
                    $usersSearchable = $this->usersSearchable;                    // [tl! .docs-hide]
                    $usersMultiSearchable = $this->usersMultiSearchable;          // [tl! .docs-hide]
            @endphp                                                               {{-- [tl! .docs-hide] --}}
            {{-- Notice `searchable` + `single` --}}
            <x-choices
                label="Searchable + Single"
                wire:model="user_searchable_id"
                :options="$usersSearchable"
                placeholder="Search ..."
                single
                searchable />

            {{-- Notice custom `search-function` --}}
            <x-choices
                label="Searchable + Multiple"
                wire:model="users_multi_searchable_ids"
                :options="$usersMultiSearchable"
                placeholder="Search ..."
                search-function="searchMulti"
                no-result-text="Ops! Nothing here ..."
                no-progress
                searchable />
        @endverbatim
    </x-code-example>

    <p>
        You must also consider displaying pre-selected items on list,
        when it <strong>first renders</strong> and <strong>while searching</strong>.
        There are many approaches to make it work, but here is an example for <strong>single search</strong> using
        <strong>Volt.</strong>
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            new class extends Component {

                // Selected option
                public ?int $user_searchable_id = null;

                // Options list
                public Collection $usersSearchable;

                public function mount()
                {
                    // Fill options when component first renders
                    $this->search();
                }

                // Also called as you type
                public function search(string $value = '')
                {
                    // Besides the search results, you must include on demand selected option
                    $selectedOption = User::where('id', $this->user_searchable_id)->get();

                    $this->usersSearchable = User::query()
                        ->where('name', 'like', "%$value%")
                        ->take(5)
                        ->orderBy('name')
                        ->get()
                        ->merge($selectedOption);     // <-- Adds selected option
                }
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        Sometimes you don't want to hit a datasource on <strong>every keystroke</strong>.
        So, you can make use of <code>debounce</code> to control over how often a network request is sent.
    </p>

    <p>
        Another approach is to use <code>min-chars</code> attribute to avoid hit <strong>search method</strong> itself until you have typed such amount of chars.
    </p>

    <x-code-example class="sm:px-64">
        @verbatim('docs')
            @php                                                              // [tl! .docs-hide]
                $usersSearchableMinChars = $this->usersSearchableMinChars;    // [tl! .docs-hide]
            @endphp                                                           {{-- [tl! .docs-hide] --}}
            {{-- Notice `min-chars` and `debounce` --}}
            <x-choices
                label="Searchable + Single + Debounce + Min chars"
                wire:model="user_searchable_min_chars_id"
                :options="$usersSearchableMinChars"
                search-function="searchMinChars"
                debounce="300ms" {{-- Default is `250ms`--}}
                min-chars="2" {{-- Default is `0`--}}
                hint="Type at least 2 chars"
                single
                searchable />
        @endverbatim
    </x-code-example>

    <p>
        You can pass any extra arbitrary search parameters like this.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            {{-- Notice `search-function` with extra arbitrary parameters --}}
            <x-choices
                label="Extra parameters"
                wire:model="user_id"
                :options="$users"
                search-function="searchExtra(123, 'thing')"
                searchable />
        @endverbatim
    </x-code-example>

    <!-- @formatter:off -->
    <x-code-example no-render language="php">
        @verbatim('docs')
        public function search(string $value = '', int $extra1 = 0, string $extra2 = '')
        {
            // The first parameter is the default and comes from the search input.
        }
        @endverbatim
    </x-code-example>
    <!-- @formatter:on -->

    <x-anchor title="Slots" size="text-xl" class="mt-14" />

    <p>
        You have full control on rendering items by using the <code>&#x40;scope('item', $object)</code> special blade directive.
        It injects the current <code>$object</code> from the loop's context and achieves the same behavior that you would expect from the Vue/React scoped slots.
    </p>

    <p>
        You can customize the list item and selected item slot. <strong>Searchable (online) works with blade syntax</strong>.
    </p>

    {{--@formatter:off--}}
    <x-code-example class="sm:px-32">
        @verbatim('docs')
            <div>                                       <!-- [tl! .docs-hide] -->
                @php $users = $this->users; @endphp     <!-- [tl! .docs-hide] -->
            </div>                                      <!-- [tl! .docs-hide] -->
            <x-choices label="Slots (online)" wire:model="user_custom_slot_id" :options="$users" single>
                {{-- Item slot --}}
                @scope('item', $user)
                    <x-list-item :item="$user" sub-value="bio">
                        <x-slot:avatar>
                            <x-icon name="o-user" class="bg-primary/10 p-2 w-9 h-9 rounded-full" />
                        </x-slot:avatar>
                        <x-slot:actions>
                            <x-badge :value="$user->username" class="badge-soft badge-primary badge-sm" />
                        </x-slot:actions>
                    </x-list-item>
                @endscope

                {{-- Selection slot--}}
                @scope('selection', $user)
                    {{ $user->name }} ({{ $user->username }})
                @endscope
            </x-choices>
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <br>
    <p>
        You can <strong>append or prepend</strong> anything like this. Make sure to use appropriated css round class on left or right.
    </p>

    {{--@formatter:off--}}
    <x-code-example class="sm:px-32">
        @verbatim('docs')
            <div>                                       <!-- [tl! .docs-hide] -->
                @php $users = $this->users @endphp      <!-- [tl! .docs-hide] -->
            </div>                                      <!-- [tl! .docs-hide] -->
            <x-choices label="Slots" wire:model="user_custom_slot_id" :options="$users" single>
                <x-slot:prepend>
                    {{-- Add `join-item` to all prepended elements --}}
                    <x-button icon="o-trash" class="join-item" />
                </x-slot:prepend>
                <x-slot:append>
                    {{-- Add `join-item` to all appended elements --}}
                    <x-button label="Create" icon="o-plus" class="join-item btn-primary" />
                </x-slot:append>
            </x-choices>
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Note about large numbers" size="text-xl" class="mt-14" />

    <p>
        This component uses the options <code>id</code> values to handle selection.
        It tries to determine if these values are a <code>int</code> or <code>string</code>.
    </p>
    <p>
        But, due to Javascript limitation with large numbers like these below, it will break.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            public array $options = [
                [
                    'id' => 264454000038134081,  # <-- Javascript won't handle this number
                    'name' => 'Test 1',
                ],
                [
                    'id' => '264454000038134082',  # <-- It is good!
                    'name' => 'Test 2',
                ],
            ];
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        As workaround, define the <code>id</code> as a string and use <strong>values-as-string</strong> attribute instead.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <x-choices ... values-as-string />
            <x-choices-offline ... values-as-string />
        @endverbatim
    </x-code-example>

    <x-anchor title="Events" size="text-xl" class="mt-14" />

    <p>
        You can catch component events just like described on Livewire docs.
        In this case the component will trigger the <code>@change-selection</code> and it will contain the selected items keys.
    </p>

    <p>
        The payload contains a <strong>single key</strong> or an <strong>array of keys</strong>, depending on how you set the component.
        Because it is a custom event, you must access the key(s) via the <code>detail.value</code> property on the event.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <x-choices ... @change-selection="console.log($event.detail.value)" />
            <x-choices-offline ... @change-selection="console.log($event.detail.value)" />
        @endverbatim
    </x-code-example>

</div>
