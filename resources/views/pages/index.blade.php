{{-- blade-formatter-disable --}}
<x-layouts.landing>

<div class="my-5 flex justify-center items-center">    
    <span class="bg-pink-100 rounded text-sm  text-gray-800 px-2 py-0.5 font-bold -rotate-6">
        Works with Livewire 3
    </span>                
    
</div>

<div class="font-extrabold text-6xl text-center mb-10 mt-20">
    Do <span class="underline decoration-green-500">more</span> with <span class="underline decoration-rose-500">less</span>.    
</div>


<div class="text-center mb-32">
    <div class="text-lg">
        Mary is a set of composable <strong>Laravel blade components</strong> styled around daisyUI and Tailwind. 
        <p>Don`t repeat your self.</p>
    </div>
    
    <div class="mt-10">
        <a wire:navigate href="/docs/installation" class="btn btn-primary">            
            Get started
            <x-icon name="o-arrow-right" />
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-5 mb-10 bg-base-200/50 -mx-20 px-20 py-20">

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



<div class="font-extrabold text-4xl mb-10 text-right"> 
    Less code, more action.
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10">

<x-code no-render>
@verbatim
    @foreach($users as $user) 
        <x-list-item :item="$user" sub-value="email" link="/docs/installation">
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
            <x-list-item :item="$user" sub-value="email" link="/docs/installation">
                <x-slot:action>
                    <x-button icon="o-trash" />
                </x-slot:action>
            </x-list-item>
        @endforeach
    </div>

</x-mockup>

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

</x-layouts.landing>
{{-- blade-formatter-enable --}}
