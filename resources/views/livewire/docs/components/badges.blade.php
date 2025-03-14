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
    <x-anchor title="Standalone" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            <x-badge value="Hello" />

            <x-badge value="Hello" class="badge-primary" />

            <x-badge value="Hello" class="badge-primary badge-soft " />

            <x-badge value="Hello" class="badge-warning" />

            <x-badge value="Hello" class="badge-error badge-dash" />
        @endverbatim
    </x-code>

    <x-anchor title="Combined" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            <x-button>
                Inbox
                <x-badge value="+99" class="badge-neutral badge-sm" />
            </x-button>

            <x-button class="indicator">
                Inbox
                <x-badge value="7" class="badge-secondary badge-sm indicator-item" />
            </x-button>
        @endverbatim
    </x-code>
</div>
