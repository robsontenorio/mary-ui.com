<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Mary\View\Components\Alert;

new
#[Title('Alert')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI alert component with icon and customizable slots.'])]
class extends Component {
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

            <x-alert title="I am soft" icon="o-exclamation-triangle" class="alert-info alert-soft" />

            <x-alert title="I am outlined" icon="o-exclamation-triangle" class="alert-info alert-outline" />

            <x-alert title="Dismissible" description="Click the close icon" icon="o-exclamation-triangle" dismissible />
        @endverbatim
    </x-code>

    {{--    <hr class="my-10 border-base-300" />--}}
    {{--    <x-anchor title="API" size="text-2xl" class="mt-10 !mb-5" />--}}
    {{--    <x-api-generator :class-name="Alert::class" />--}}
    {{--    <div class="mb-64"></div>--}}
</div>
