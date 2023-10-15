<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Alert')] class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Alert" />

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-alert title="You have 10 messages" icon="o-exclamation-triangle" />

            <x-alert title="Hey!" description="Ho!" icon="o-home" class="alert-warning" />

            <x-alert icon="o-exclamation-triangle" class="alert-success">
                I am using the <strong>default slot.</strong>
            </x-alert>

            <x-alert title="With actions" description="Hi" icon="o-envelope" class="alert-info">
                <x-slot:actions>
                    <x-button label="See" />
                </x-slot:actions>
            </x-alert>

            <x-alert title="I have a shadow" icon="o-exclamation-triangle" shadow />
        @endverbatim
    </x-code>
</div>
