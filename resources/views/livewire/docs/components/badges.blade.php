<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Badges')] class extends Component {
}
?>
<div class="docs">

    <x-header title="Badges" />
    <x-header title="Standalone" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            <x-badge value="Hello" />

            <x-badge value="Hello" class="badge-primary" />

            <x-badge value="Hello" class="badge-warning" />

            <x-badge value="Hello" class="bg-cyan-200" />
        @endverbatim
    </x-code>

    <x-header title="Combined" size="text-2xl" class="mt-10 mb-5" />

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
