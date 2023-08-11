{{-- blade-formatter-disable --}}
<x-layouts.landing>

<div class="bg-gradient-to-r from-white via-purple-50  to-white -mt-20 pt-20 pb-32 px-5 lg:px-20 dark:text-black">
    <div class="my-5 flex justify-center items-center">    
        <span class="bg-yellow-200 rounded text-sm  text-gray-800 px-2 py-0.5 font-bold -rotate-6">
            Works with Livewire 3
        </span>                    
    </div>

    <div class="font-extrabold text-6xl text-center mb-10 mt-20">
        Do <span class="underline decoration-green-500">more</span> with <span class="underline decoration-rose-500">less</span>.    
    </div>

    <div class="text-center">
        <div class="text-lg">
            Develop at light speed with this set of composable <strong>Laravel blade components</strong> styled around daisyUI and Tailwind. 
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
        <x-input label="Name" icon="o-user" placeholder="Full name" />
        <x-input label="Ammount" prefix="R$" money />    
        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Save" class="btn-primary" type="submit" />
        </x-slot:actions>
    </x-form>
</x-mockup>


<x-code no-render>
    @verbatim
    <x-form wire:submit="save">
        <x-input label="Name" icon="o-user" placeholder="Full name" />
        <x-input label="Ammount" prefix="R$" money />    
        <x-slot:actions>
            <x-button label="Cancel" />
            <x-button label="Save" class="btn-primary" type="submit" />
        </x-slot:actions>
    </x-form>
    @endverbatim
</x-code>

</div>


<div class="bg-base-200/50 px-5 lg:px-20 pb-20">
<div class="font-extrabold text-4xl py-10 text-right"> 
    Less code, more action.
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10">

<x-code no-render>
@verbatim
    @foreach($users as $user) 
        <x-list-item :item="$user" sub-value="username" link="/docs/installation">
            <x-slot:action>
                <x-button icon="o-trash" />
            </x-slot:action>
        </x-list-item>
    @endforeach
@endverbatim
</x-code>

<x-mockup>
    @php
        $users = App\Models\User::take(3)->get();
    @endphp 

    <div>
        @foreach($users as $user) 
            <x-list-item :item="$user" sub-value="username" link="/docs/installation">
                <x-slot:action>
                    <x-button icon="o-trash" />
                </x-slot:action>
            </x-list-item>
        @endforeach
    </div>

</x-mockup>
</div>

</div>

{{-- <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
<x-mockup>
    fff
</x-mockup>


<x-code no-render>
    @verbatim
   ...
    @endverbatim
</x-code>
</div> --}}

<div class="mt-10 text-center">
    <a wire:navigate href="/docs/installation" class="btn btn-primary">            
        Let`s do it
        <x-icon name="o-arrow-right" />
    </a>
</div>

</x-layouts.landing>
{{-- blade-formatter-enable --}}
