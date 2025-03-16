<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Select')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI native select component with icon and disabled option state.'])]
class extends Component {
    public int $selectedUser = 4;

    public int $selectedUser2 = 3;

    public int $selectedUser3 = 0;
}

?>

<div class="docs">
    <x-anchor title="Select" />

    <p>
        This component is intended to be used as a simple native HTML value selection. It renders nice on all devices.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        If you need a rich selection value interface or async search check the <a href="/docs/components/choices" wire:navigate>Choices</a> component.
    </x-alert>

    <x-anchor title="Basic" size="text-xl" class="mt-14 !mb-5" />

    <p>
        By default, it will look up for:
    </p>

    <ul>
        <li><code>$object->id</code> for option value.</li>
        <li><code>$object->name</code> for option display label.</li>
    </ul>

    <br>

    <x-code class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                                            // [tl! .docs-hide]
                $users = App\Models\User::take(5)->get();   // [tl! .docs-hide]
            @endphp                                         <!-- [tl! .docs-hide] -->
            <x-select label="Master user" wire:model="selectedUser" :options="$users" icon="o-user" />

            <x-select label="Right icon" wire:model="selectedUser" :options="$users" icon-right="o-user" />

            <x-select label="Prefix" wire:model="selectedUser" :options="$users" prefix="Hey" hint="Hey ho!" />

            <span></span><!-- [tl! .docs-hide] -->
            <x-select label="Inline label" wire:model="selectedUser" icon="o-user" :options="$users" inline />
        @endverbatim
    </x-code>

    <x-anchor title="Alternative attributes" size="text-xl" class="mt-14" />

    <p>
        Just set <code>option-value</code> and <code>option-label</code> representing the desired targets.
    </p>

    <x-code class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                                             // [tl! .docs-hide]
                $users = App\Models\User::take(5)->get();   // [tl! .docs-hide]
            @endphp                                         <!-- [tl! .docs-hide] -->
            <x-select
                label="Alternative"
                wire:model="selectedUser2"
                :options="$users"
                option-value="custom_key"
                option-label="other_name" />
        @endverbatim
    </x-code>

    <x-anchor title="Placeholder" size="text-xl" class="mt-14" />

    <x-code class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                                             // [tl! .docs-hide]
                $users = App\Models\User::take(5)->get();   // [tl! .docs-hide]
            @endphp                                         <!-- [tl! .docs-hide] -->
            <x-select
                label="Users"
                wire:model="selectedUser2"
                :options="$users"
                placeholder="Select a user"
                placeholder-value="0" {{-- Set a value for placeholder. Default is `null` --}}
            />
        @endverbatim
    </x-code>

    <x-anchor title="States" size="text-xl" class="mt-14" />
    <p>
        Notice that browser standards <b>does not support "readonly"</b>.
    </p>

    <x-code class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php                                             // [tl! .docs-hide]
                $users = App\Models\User::take(5)->get();   // [tl! .docs-hide]
            @endphp                                         <!-- [tl! .docs-hide] -->
            <x-select label="Disabled" :options="$users" wire:model="selectedUser" disabled />
        @endverbatim
    </x-code>

    <x-anchor title="Disabled options" size="text-xl" class="mt-14" />

    <x-code class="grid gap-5 sm:px-64">
        @verbatim('docs')
            @php
                $users = [
                    ['id' => 1, 'name' => 'Joe'],
                    ['id' => 2,'name' => 'Mary','disabled' => true] // <-- this
                ];
            @endphp

            <x-select label="Disabled options" :options="$users" wire:model="selectedUser3" />
        @endverbatim
    </x-code>

    <x-anchor title="Group" size="text-xl" class="mt-14" />

    <p>
        This component uses the native HTML grouped select.
    </p>

    {{--@formatter:off--}}
    <x-code class="gap gap-5 sm:px-64">
        @verbatim('docs')
            @php
                $grouped = [
                    'Admins' => [
                        ['id' => 1, 'name' => 'Mary'],
                        ['id' => 2, 'name' => 'Giovanna'],
                        ['id' => 3, 'name' => 'Marina']
                     ],
                    'Users' => [
                        ['id' => 4, 'name' => 'John'],
                        ['id' => 5, 'name' => 'Doe'],
                        ['id' => 6, 'name' => 'Jane']
                    ],
                ];
            @endphp

            <x-select-group label="Group Select" :options="$grouped" wire:model="selectedUser" />
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Slots" size="text-xl" class="mt-14" />

    <p>
        You can <strong>append or prepend</strong> anything like this. Make sure to use appropriated css round class on left or right.
    </p>

    {{--@formatter:off--}}
    <x-code class="gap gap-5 sm:px-32">
        @verbatim('docs')
            @php                                            // [tl! .docs-hide]
                $users = App\Models\User::take(5)->get();   // [tl! .docs-hide]
            @endphp                                         <!-- [tl! .docs-hide] -->
            <x-select label="Slots"  :options="$users" single>
                <x-slot:prepend>
                    {{-- Add `join-item` to all prepended elements --}}
                    <x-button icon="o-trash" class="join-item" />
                </x-slot:prepend>
                <x-slot:append>
                    {{-- Add `join-item` to all appended elements --}}
                    <x-button label="Create" icon="o-plus" class="join-item btn-primary" />
                </x-slot:append>
            </x-select>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}
</div>
