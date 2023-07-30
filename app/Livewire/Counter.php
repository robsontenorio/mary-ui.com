<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <h1>{{ $count }}</h1>

            <x-button label="+" wire:click="increment" class="btn-info" />
            <x-button label="-" wire:click="decrement" class="btn-error" />
        </div>
        HTML;
    }
}
