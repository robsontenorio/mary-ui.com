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
    // Single NOT SEARCHABLE
    #[Rule('required')]
    public ?int $userA_id = 1;

    // Single NOT SEARCHABLE (available options)
    public Collection $usersA;

    // Single searchable
    #[Rule('required')]
    public ?int $userB_id = 3;

    // Single searchable (available options)
    public Collection $usersB;

    // Multiple NOT SEARCHABLE
    #[Rule('required')]
    public array $usersC_ids = [];

    // Multiple NOT SEARCHABLE (available options)
    public Collection $usersC;

    // Multiple searchable
    #[Rule('required')]
    public array $usersD_ids = [];

    // Multiple searchable (available options)
    public Collection $usersD;

    public function mount()
    {
        // Populates $usersA (Single NOT SEARCHABLE, it is a static list)
        $this->usersA = User::take(4)->get();

        // Populates $usersC (Multi NOT SEARCHABLE, it is a static list)
        $this->usersC = User::take(4)->get();

        // Populates $usersB (Single searchable)
        $this->search();

        // Populates $usersB (Multi searchable)
        $this->searchMulti();
    }

    public function save()
    {
        $this->validate();
    }

    // For single searchable ($usersB)
    public function search(string $value = '')
    {
        // Besides the search results, you must include pre-selected IDs
        $preUsers = User::where('id', $this->userB_id)->orderBy('name')->get();

        $this->usersB = User::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($preUsers);     // <-- Adds pre-selected IDs
    }

    // For multi searchable ($usersD)
    public function searchMulti(string $value = '')
    {
        // Besides the search results, you must include pre-selected IDs
        $preUsers = User::whereIn('id', $this->usersD_ids)->orderBy('name')->get();

        $this->usersD = User::query()
            ->where('name', 'like', "%$value%")
            ->take(5)
            ->orderBy('name')
            ->get()
            ->merge($preUsers);     // <-- Adds pre-selected IDs
    }
}
?>

<div class="docs">
    <x-anchor title="Choices" />

    {{--    <x-choices2 label="Single" wire:model="userA_id" :options="$usersA" hint="Hello !" />--}}

    ... {{ $userB_id }}

    @php
        dump($usersB->pluck('name', 'id')->toArray());
    @endphp

    <x-choices2 label="Single single" wire:model="userA_id" :options="$usersA" />

    <x-choices2 label="Single Searchable" wire:model="userB_id" :options="$usersB" searchable />

    <x-choices2 label="Multiple" wire:model="usersC_ids" :options="$usersC" multiple />

    <x-choices2
        label="Multiple Searchable"
        wire:model="usersD_ids"
        :options="$usersD"
        search-function="searchMulti"
        no-result-text="Nothing here"
        icon="o-users"
        searchable
        multiple
    />

    <x-button label="save" wire:click="save" />

</div>
