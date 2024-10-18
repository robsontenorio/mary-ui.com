<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Sidebar')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI sidebar component'])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Sidebar" />

    <x-alert icon="o-light-bulb" class="markdown my-10">
        This component only works with the <b>main layout</b> component.
    </x-alert>

    <x-anchor title="Attributes" size="text-2xl" class="mt-10 mb-5" />

    <!-- @formatter:off -->
    <x-code no-render>
        @verbatim('docs')
            <x-slot:sidebar
                drawer="main-drawer"          {{-- Drawer ID trigger for mobile --}}
                collapsible                   {{-- Make it collapsible --}}
                collapse-text="Hide it"       {{-- Custom collapsible text --}}
                class="bg-base-100"           {{-- Any Tailwind class--}}
                right                         {{-- Move it to the right side --}}
                right-mobile                  {{-- Move the drawer to the right side only for mobile devices --}}
            >
                ...
            </x-slot:sidebar>
        @endverbatim
    </x-code>
    <!-- @formatter:on -->

    <x-anchor title="Right side" size="text-2xl" class="mt-10 mb-5" />

    <p>
        By default, the sidebar is on the <b>left side</b>. But you can easily move it to the right side by adding the <code>right</code> attribute.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-main>
                <x-slot:sidebar ... right>
                    ...
                </x-slot:sidebar>
            </x-main>
        @endverbatim
    </x-code>

    <p>
        The following example shows how to move the sidebar (the drawer) to the right side <b>only for mobile devices</b>.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-main>
                <x-slot:sidebar ... right-mobile>
                    ...
                </x-slot:sidebar>
            </x-main>
        @endverbatim
    </x-code>
</div>
