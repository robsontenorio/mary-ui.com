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
            <x-tabs selected="tab1">
                <x-tab name="tab1" label="Users" icon="o-users">
                    <span>Users</span>
                </x-tab>
                <x-tab name="tab2" label="Offices" icon="o-building-office">
                    <span>Offices</span>
                </x-tab>
                <x-tab name="tab3" label="Musics" icon="o-musical-note">
                    <span>Musics</span>
                </x-tab>
            </x-tabs>
            <x-header :title="$count" subtitle="Here it counts!" />

            <x-button label="+" wire:click="increment" class="btn-success" />
            <x-button label="-" wire:click="decrement" class="btn-error" />
        </div>
        HTML;
    }
}
