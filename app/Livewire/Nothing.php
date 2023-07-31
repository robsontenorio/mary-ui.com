<?php

namespace App\Livewire;

use Livewire\Component;

class Nothing extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- In work, do what you enjoy. --}}
        </div>
        HTML;
    }
}
