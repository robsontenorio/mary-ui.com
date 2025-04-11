<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Input')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI input component with builtin validation, icons, label, validation, currency, prefix/suffix and customizable slots.'])]
class extends Component {
    public string $address = 'CA, Street 1';

    public string $password = 'Hello!';

    public string $money1 = '123456.78';

    public string $money2 = '123456.78';

    public string $name = '';
}

?>
<div>

    <x-anchor title="Input" />

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            <x-input label="Name" wire:model="name" placeholder="Your name" icon="o-user" hint="Your full name" />

            <x-input label="Right icon" wire:model="address" icon-right="o-map-pin" />

            <x-input label="Clearable" wire:model="name" placeholder="Clearable field" clearable />

            <x-input label="Prefix & Suffix" wire:model="name" prefix="www" suffix=".com" />

            <span></span><!-- [tl! .docs-hide] -->
            <x-input label="Inline label" wire:model="name" placeholder="Hey, inline..." inline />
        @endverbatim
    </x-code-example>

    <x-anchor title="States" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            <x-input label="Disabled" value="It is disabled" disabled />

            <x-input label="Read only" value="Read only" readonly />
        @endverbatim
    </x-code-example>

    <x-anchor title="Password" size="text-xl" class="mt-14" />

    <p>
        All above attributes will work with the password component.
    </p>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            <x-password label="Toggle" hint="It toggles visibility" wire:model="password" clearable />
            <x-password label="Right toggle" wire:model="password" right />
            <x-password label="Custom icons" wire:model="password" password-icon="o-lock-closed" password-visible-icon="o-lock-open" />
            <div></div> <!-- [tl! .docs-hide] -->
            <x-password label="Without toggle" wire:model="password" only-password inline />
        @endverbatim
    </x-code-example>

    <x-anchor title="Currency" size="text-xl" class="mt-14" />

    <x-code-example no-render>
        @verbatim('docs')
            <head>
                ...

                {{--  Currency  --}}
                <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>
            </head>
        @endverbatim
    </x-code-example>

    <x-code-example class="grid gap-5 sm:px-64">
        @verbatim('docs')
            <x-input label="Default money" wire:model="money1" prefix="USD" money />

            {{-- Notice that `locale` accepts any valid locale --}}
            <x-input label="Custom money" wire:model="money2" prefix="R$" locale="pt-BR" money />
        @endverbatim
    </x-code-example>

    <x-anchor title="Slots" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 sm:px-16">
        @verbatim('docs')
            @php                                                // [tl! .docs-hide]
                $users = App\Models\User::take(5)->get();       // [tl! .docs-hide]
            @endphp                                             <!-- [tl! .docs-hide] -->
            <x-input label="Prepend a select">
                <x-slot:prepend>
                    {{-- Add `join-item` to all prepended elements --}}
                    <x-select icon="o-user" :options="$users" class="join-item bg-base-200" />
                </x-slot:prepend>
            </x-input>

            <x-input label="Append a button">
                <x-slot:append>
                    {{-- Add `join-item` to all appended elements --}}
                    <x-button label="I am a button" class="join-item btn-primary" />
                </x-slot:append>
            </x-input>
        @endverbatim
    </x-code-example>
</div>
