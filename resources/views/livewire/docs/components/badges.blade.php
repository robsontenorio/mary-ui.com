<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Badges')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI badge component.'])]
class extends Component {
}
?>
<div class="docs">

    <x-anchor title="Badges" />
    <x-anchor title="Standalone" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            <x-badge value="Hello" />

            <x-badge value="Hello" class="badge-primary" />

            <x-badge value="Hello" class="badge-primary badge-soft " />

            <x-badge value="Hello" class="badge-warning" />
        @endverbatim
    </x-code>

    <x-anchor title="Combined" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-button>
                Inbox
                <x-badge value="+99" class="badge-neutral" />
            </x-button>

            <x-button class="indicator">
                Inbox
                <x-badge value="7" class="badge-secondary indicator-item" />
            </x-button>

            <x-button icon="o-bell" class="btn-circle relative">
                <x-badge value="2" class="badge-error absolute -right-2 -top-2" />
            </x-button>
        @endverbatim
    </x-code>
</div>
