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
            <x-header :title="$count" subtitle="Here it counts!" />

            <x-button label="+" wire:click="increment" class="btn-success" />
            <x-button label="-" wire:click="decrement" class="btn-error" />
        </div>
        HTML;
    }
}
