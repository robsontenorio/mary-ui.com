<?php

use function Livewire\Volt\computed;
use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('components.layouts.landing');

state(['name', 'amount']);

rules([
    'name' => 'required|min:10',
    'amount' => 'required|decimal:0,2|gt:0',
]);

$users = computed(fn () => App\Models\User::take(3)->get());

$save = function () {
    sleep(1);
    $this->validate();
};

$delete = function () {
    sleep(1);
};

?>

<div>

<div class="bg-gradient-to-r from-white via-purple-50  to-white -mt-20 pt-20 pb-32 px-5 lg:px-20 dark:text-black">    
    <div class="font-extrabold text-6xl text-center mb-10 mt-20">
        Do <span class="underline decoration-green-500">more</span> with <span class="underline decoration-red-500 decoration-wavy">less</span>.    
    </div>
    
    
    <div class="text-center">
        <div class="text-lg leading-10">
            Nice <span class="bg-red-100 px-2 py-1 rounded  font-bold decoration-wavy">Laravel blade components</span> 
            <br>made for
            <span class="bg-yellow-100 px-2 py-1 rounded  font-bold decoration-wavy">Livewire 3</span> <br>
             styled with <span class="bg-sky-100 px-2 py-1 rounded  font-bold decoration-wavy">daisyUI + Tailwind</span>
        </div>
        
        <div class="mt-10">
            <a wire:navigate href="/docs/installation" class="btn btn-primary">            
                Get started
                <x-icon name="o-arrow-right" />
            </a>
        </div>
    </div>
</div>

<div class="font-extrabold text-4xl py-10 px-5 lg:px-20"> 
    Less code, more action.
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-5 mb-10  px-5 lg:px-20">


<x-mockup>
    <x-form wire:submit="save">
        <x-input label="Name" wire:model="name" icon="o-user" placeholder="Full name" />
        <x-input label="Amount" wire:model="amount" prefix="US" money />    
        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Clik me!" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>
</x-mockup>


<x-code no-render>
@verbatim
<x-form wire:submit="save">
    <x-input label="Name" wire:model="name" icon="o-user" placeholder="Full name" />
    <x-input label="Amount" wire:model="amount" prefix="US" money />    
    <x-slot:actions>
        <x-button label="Cancel" />
        <x-button label="Clik me!" class="btn-primary" type="submit" spinner="save" />
    </x-slot:actions>
</x-form>
@endverbatim
</x-markdown>

</div>

<div class="bg-base-200/50 px-5 lg:px-20 pb-20">
    <div class="font-extrabold text-4xl py-10 text-right"> 
        Less code, more action.
    </div>

<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10">

<x-code no-render>
@verbatim
@foreach($this->users as $user) 
    <x-list-item :item="$user" sub-value="username" link="/docs/installation">
        <x-slot:action>
            <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner/>
        </x-slot:action>
    </x-list-item>
@endforeach
@endverbatim
</x-markdown>


<x-mockup>       
    <div>
        @foreach($this->users as $user) 
            <x-list-item :item="$user" sub-value="username" link="/docs/installation">
                <x-slot:action>
                    <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner/>
                </x-slot:action>
            </x-list-item>
        @endforeach
    </div>
</x-mockup>

</div>

</div>


<div class="mt-10 text-center">
    <a wire:navigate href="/docs/installation" class="btn btn-primary">            
        Let`s do it
        <x-icon name="o-arrow-right" />
    </a>
</div>

</div>