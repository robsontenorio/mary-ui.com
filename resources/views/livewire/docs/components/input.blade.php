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

<x-code class="grid gap-4">
@verbatim
<x-input label="Name" placeholder="Your name" hint="Fill with your full name" />

<x-input label="E-mail" wire:model="email" icon="o-envelope" />

<!-- It uses Alpine x-mask plugin for money -->
<x-input label="Auto money" wire:model="money1" prefix="US" money hint="It submits a unmasked value" />

<!-- It uses Alpine x-mask plugin for money -->
<x-input 
    label="Custom money" 
    wire:model="money2" 
    prefix="R$" 
    money     
    thousands-separator="."  
    fraction-separator="," 
    hint="It submits a unmasked value" />
    
@endverbatim
</x-code>
</div>