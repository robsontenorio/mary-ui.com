<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('List Item')]
#[Layout('layouts.app', ['description' => 'Livewire UI list item component with link, avatar and customizable slots.'])]
class extends Component {
    public function delete()
    {
        sleep(1);
    }
}

?>

<div class="docs">
    <x-anchor title="List Item" />

    <p>
        By default, this will look up for:
    </p>

    <ul>
        <li><code>$object->name</code> as the main value.</li>
        <li><code>$object->avatar</code> as the picture url.</li>
    </ul>

    <br>

    <x-code-example>
        @verbatim('docs')
            @php                                                // [tl! .docs-hide]
                $users = App\Models\User::take(3)->get();       // [tl! .docs-hide]
            @endphp                                             <!-- [tl! .docs-hide] -->
            @foreach($users as $user)
                <x-list-item :item="$user" sub-value="username" link="/docs/installation" />
            @endforeach
        @endverbatim
    </x-code-example>

    <x-anchor title="Alternative attributes" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php                                                        // [tl! .docs-hide]
                $user1 = App\Models\User::inRandomOrder()->first();     // [tl! .docs-hide]
            @endphp                                                     <!-- [tl! .docs-hide] -->
            {{-- Notice `city.name`. It supports nested properties --}}
            <x-list-item :item="$user1" value="other_name" sub-value="city.name" avatar="other_avatar" />
        @endverbatim
    </x-code-example>

    <x-anchor title="No separator & no hover" size="text-xl" class="mt-14" />

    {{--@formatter:off--}}
    <x-code-example>
        @verbatim('docs')
            @php                                                // [tl! .docs-hide]
                $users = App\Models\User::take(3)->get();       // [tl! .docs-hide]
            @endphp                                             <!-- [tl! .docs-hide] -->
            <!-- [tl! .docs-hide] --> @foreach($users as $user)
            <x-list-item :item="$user" no-separator no-hover />
            @endforeach                                         <!-- [tl! .docs-hide] -->
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Slots" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php                                                        // [tl! .docs-hide]
                $user1 = App\Models\User::inRandomOrder()->first();     // [tl! .docs-hide]
            @endphp                                                     <!-- [tl! .docs-hide] -->
            <x-list-item :item="$user1">
                <x-slot:avatar>
                    <x-badge value="top user" class="badge-primary badge-soft" />
                </x-slot:avatar>
                <x-slot:value>
                    Custom value
                </x-slot:value>
                <x-slot:sub-value>
                    Custom sub-value
                </x-slot:sub-value>
                <x-slot:actions>
                    <x-button icon="o-trash" class="btn-sm" wire:click="delete(1)" spinner />
                </x-slot:actions>
            </x-list-item>
        @endverbatim
    </x-code-example>
</div>
