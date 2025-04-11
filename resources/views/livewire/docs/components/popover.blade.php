<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Popover')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI popover component.'])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Popover" />

    <p>
        This component uses the the built-in Alpine's <a href="https://alpinejs.dev/plugins/anchor" target="_blank">anchor plugin</a>.
    </p>

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php                                        // [tl! .docs-hide]
                $user = App\Models\User::first();       // [tl! .docs-hide]
            @endphp                                     <!-- [tl! .docs-hide] -->
            <x-popover>
                <x-slot:trigger>
                    <x-avatar :image="$user->avatar" :title="$user->username" />
                </x-slot:trigger>
                <x-slot:content>
                    From: {{ $user->city->name }} <br>
                    Email: {{ $user->email }}
                </x-slot:content>
            </x-popover>
        @endverbatim
    </x-code-example>

    <x-anchor title="Position and Offset" size="text-xl" class="mt-14" />

    <p>
        As this component uses Alpine's anchor plugin,
        you can use same parameters described on its docs for <code>offset</code> and <code>position</code>.
    </p>

    <x-code-example>
        @verbatim('docs')
            <x-popover position="top-start" offset="20">
                <x-slot:trigger>
                    <x-button label="Hey" />
                </x-slot:trigger>
                <x-slot:content>
                    How are you?
                </x-slot:content>
            </x-popover>
        @endverbatim
    </x-code-example>

    <x-anchor title="Styling" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php                                        // [tl! .docs-hide]
                $user = App\Models\User::first();       // [tl! .docs-hide]
            @endphp                                     <!-- [tl! .docs-hide] -->
            <x-popover>
                <x-slot:trigger class="bg-base-200 p-2 rounded-lg">
                    {{ $user->username }}
                </x-slot:trigger>
                <x-slot:content class="border border-warning !w-40 text-sm">
                    <x-avatar :image="$user->avatar" />
                    {{ $user->bio }}
                </x-slot:content>
            </x-popover>
        @endverbatim
    </x-code-example>
</div>
