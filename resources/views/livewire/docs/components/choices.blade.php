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

    public Collection $options;

    public function mount()
    {
        $this->search();
    }

    public function save()
    {
        sleep(1);
        $this->validate();
    }

    public function search(?string $term = '')
    {
        $selectedUser1 = User::find($this->user1_id);
        $selectedUser2 = User::find($this->user2_id);
        $selectedUser3 = User::find($this->user3_id);
        $selectedUser4 = User::find($this->user4_id);

        $this->options = User::query()
            ->where('username', 'like', "%{$term}%")
            ->take(4)
            ->orderBy('username')
            ->get()
            ->prepend($selectedUser1)
            ->prepend($selectedUser2)
            ->prepend($selectedUser3)
            ->prepend($selectedUser4)
            ->filter()
            ->unique();

    }
}

?>

<div>
<x-markdown class="markdown">
# Choices

This component is intended to be used to build complex selection interface. It also suports **async search** when dealing with large lists.
</x-markdown>

<x-alert icon="o-light-bulb" class="markdown mb-10">
    If you need a simple native HTML value selection just use <a href="/docs/components/select" wire:navigate>Select</a> component.
</x-alert>

<x-markdown class="markdown">
### Single

It will lookup for:

- `$object->id` for option value.
- `$object->name` for option display label.
- `$object->avatar` for avatar picture.

<br>
</x-markdown>

<div class="border border-dashed border-gray-300 bg-base-200/50 p-8 rounded-lg flex gap-8">
    <x-choices label="Simple" wire:model="user1_id" :options="$options" single />

    <x-choices 
        label="Custom" 
        wire:model="user2_id" 
        :options="$options" 
        option-label="username" 
        option-sub-label="city.name"   
        option-avatar="other_avatar" 
        single 
    />
</div>

<x-code no-render>
@verbatim
<!-- Note `single` -->
<x-choices label="Simple" wire:model="user1_id" :options="$options" single />

<!-- Custom options -->
<x-choices 
    label="Custom" 
    wire:model="user2_id" 
    :options="$options" 
    option-label="username"     
    option-sub-label="city.name"    {-- It suports nested values  --}
    option-avatar="other_avatar" 
    single 
/>
@endverbatim
</x-code>

<x-markdown class="markdown">
### Searchable

When dealing with large options list use `searchable` parameter.
</x-markdown>

<div class="border border-dashed border-gray-300 bg-base-200/50 p-8 rounded-lg">        
    <x-choices 
        label="Users" 
        wire:model="user3_id" 
        :options="$options" 
        icon="o-magnifying-glass"
        placeholder="Type here ..."
        single 
        searchable />
</div>
<x-code no-render>
@verbatim
<!-- Note `searchable` -->
<x-choices 
    label="Users" 
    wire:model="user3_id" 
    :options="$options" 
    icon="o-magnifying-glass"
    placeholder="Type here ..."
    single 
    searchable />
@endverbatim
</x-code>

<x-markdown>
When using `searchable` option you need to implement the `search` method. Here is a reference to get started. But, of course, you can use the approach best works for you.

<x-code no-render language="php">
@verbatim
...

public Collection $options;

public function mount()
{
    $this->search();
}

public search(string $value = ''): Collection {

    $this->options = User::query()
            ->where('name', 'like', "%{$value}%")
            ->take(5)
            ->get()
}
@endverbatim
</x-code>

### Slots

@verbatim
You have full control on rendering items by using `@scope('item', $object)` slot helper blade directive. 
It will inject current `$object` on loop context and achieves same behavior you expect from Vue/React scoped slots.
@endverbatim

</x-markdown>

<div class="border border-dashed border-gray-300 bg-base-200/50 p-8 rounded-lg">        
<x-choices label="Slots" wire:model="user4_id" :options="$options" single>
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
<x-choices label="Slots" wire:model="user4_id" :options="$options" single>
    @scope('item', $user)
        <!-- You could use any element in here. See `x-list-item` is a good fit. -->
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