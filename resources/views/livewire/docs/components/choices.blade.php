<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component
{
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

<div>
<x-markdown class="markdown">
# Choices

This component is intended to be used to build complex selection interface for single and multiple values. It also suports **async search** when dealing with large lists.
</x-markdown>

<x-alert icon="o-light-bulb" class="markdown mb-10">
    Most of time you just need a simple <a href="/docs/components/select" wire:navigate>Select</a> component. It renders nice natively on every device.
</x-alert>

<x-markdown class="markdown">
### Selection

By default it will lookup for:

- `$object->id` for option value.
- `$object->name` for option display label.
- `$object->avatar` for avatar picture.

<br>
</x-markdown>

<div class="border border-dashed border-gray-300 bg-base-200/50 p-8 rounded-lg grid grid-cols-1 gap-5">
    <x-choices label="Simple" wire:model="user1_id" :options="$users" single />
    
    <x-choices label="Multiple" wire:model="users_multiple" :options="$users" />

    <x-choices 
        label="Custom display labels" 
        wire:model="user2_id" 
        :options="$users" 
        option-label="username" 
        option-sub-label="city.name"
        option-avatar="other_avatar" 
        hint="It has custom display labels"
        single />    
</div>

<x-code no-render>
@verbatim
<!-- Note `single` -->
<x-choices label="Simple" wire:model="user1_id" :options="$users" single />

<!-- public array $users_multiple = []; -->
<x-choices label="Multiple" wire:model="users_multiple" :options="$users" />

<!-- Custom options -->
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

<x-markdown class="markdown">
### Searchable

When dealing with large options list use `searchable` parameter.
</x-markdown>

<div class="border border-dashed border-gray-300 bg-base-200/50 p-8 rounded-lg grid gap-5">        
    <x-choices 
        label="Searchable - Single" 
        wire:model="user4_id" 
        :options="$usersExampleSingleSearch"         
        no-result-text="Nothing here"
        single 
        searchable />

    <x-choices 
        label="Searchable - Multiple" 
        wire:model="users_multiple_searchable" 
        :options="$usersExampleMultiSearch"         
        search-function="otherSearch"
        no-result-text="Nothing here"        
        searchable />
</div>

<x-code no-render>
@verbatim
<!-- Note `searchable` + `single` -->
<x-choices 
    label="Searchable - Single" 
    wire:model="user4_id" 
    :options="$usersExampleSingleSearch"         
    no-result-text="Nothing here"
    single 
    searchable />

<!-- You can choose de search function name -->
<x-choices 
    label="Searchable - Multiple" 
    wire:model="users_multiple_searchable" 
    :options="$usersExampleMultiSearch"         
    search-function="otherSearch"
    no-result-text="Nothing here"        
    searchable />
@endverbatim
</x-code>

<x-markdown>
By default it calls `search()` method to get fresh options while typing. 
You can change the method name by using `search-function` parameter.
Here is a reference to get started, but, of course, you can use the approach best works for you.
</x-markdown>

<x-code no-render language="php">
@verbatim
...

// It is called by <x-choices>
public function search(string $value = '') {

    $this->usersExampleSingleSearch = User::query()
            ->where('name', 'like', "%{$value}%")
            ->take(4)
            ->get();
}
@endverbatim
</x-code>

<x-markdown>
### Slots

@verbatim
You have full control on rendering items by using `@scope('item', $object)` slot helper blade directive. 
It will inject current `$object` on loop context and achieves same behavior you expect from Vue/React scoped slots.
@endverbatim

</x-markdown>

<div class="border border-dashed border-gray-300 bg-base-200/50 p-8 rounded-lg">        
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
</div>

<x-code no-render>
@verbatim
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

</div>
