<?php

use Livewire\Volt\Component;

new class extends Component
{
    public string $email = 'mary@me.com';

    public string $money1 = '123456.78';

    public string $money2 = '123456.78';
}

?>
<div>
<x-markdown>
# Input
</x-markdown>

<x-code class="grid gap-5">
@verbatim
<x-input label="Name" placeholder="Your name" hint="Fill with your full name" />

<x-input label="E-mail" wire:model="email" icon="o-envelope" />

<hr class="my-5" />

<x-input label="Disabled"  value="It is disabled" disabled />

<x-input label="Read only"  value="Read only" readonly />

<hr class="my-5" />

<x-input label="Inline label" inline />

<x-input label="Inline label + placeholder" placeholder="Hi!" icon="o-envelope" hint="Awsome" inline />
    
@endverbatim
</x-code>

<x-markdown>
### Currency

It uses Alpine `x-mask` plugin with `$money`. Under the hood it sets an unmasked value when you submit a form.

</x-markdown>

<x-code class="grid gap-4">
@verbatim
<x-input label="Default money" wire:model="money1" prefix="USD" money inline/>

<x-input 
    label="Custom money" 
    wire:model="money2" 
    sufix="R$" 
    money     
    inline
    thousands-separator="."  
    fraction-separator=","  />    
@endverbatim
</x-code>

</div>