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

    <x-anchor title="Basic" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-input label="Name" placeholder="Your name" icon="o-user" hint="Your full name" />

            <x-input label="Right icon" wire:model="address" icon-right="o-map-pin" />

            <x-input label="Name" wire:model="name" placeholder="Clearable field" clearable />

            <x-input label="Prefix & Suffix" wire:model="name" prefix="www" suffix=".com" />
        @endverbatim
    </x-code>

    <x-anchor title="States" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-input label="Disabled" value="It is disabled" disabled />

            <x-input label="Read only" value="Read only" readonly />
        @endverbatim
    </x-code>

    <x-anchor title="Inline" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-input label="Inline label" inline />
        @endverbatim
    </x-code>

    <x-anchor title="Password" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Notice all above attributes will work with the password component.
    </p>

    <x-code class="grid gap-5">
        @verbatim('docs')
            <x-password label="Toggle" hint="It toggles visibility" wire:model="password" clearable />
            <x-password label="Right toggle" wire:model="password" right />
            <x-password label="Custom icons" wire:model="password" password-icon="o-lock-closed" password-visible-icon="o-lock-open" />
            <x-password label="Without toggle" wire:model="password" only-password />
        @endverbatim
    </x-code>

    <x-anchor title="Currency" size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...

                {{--  Currency  --}}
                <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>
            </head>
        @endverbatim
    </x-code>

    <x-code class="grid gap-8">
        @verbatim('docs')
            <x-input label="Default money" wire:model="money1" prefix="USD" money inline />

            {{-- Notice that `locale` accepts any valid locale --}}
            <x-input
                label="Custom money"
                wire:model="money2"
                suffix="R$"
                money
                inline
                locale="pt-BR" />
        @endverbatim
    </x-code>

    <x-anchor title="Slots" size="text-2xl" class="mt-10 mb-5" />

    <x-code class="grid gap-8">
        @verbatim('docs')
            @php
                $users = App\Models\User::take(5)->get();
            @endphp

            <x-input label="Prepend a select">
                <x-slot:prepend>
                    {{-- Add `rounded-e-none` class (RTL support) --}}
                    <x-select icon="o-user" :options="$users" class="rounded-e-none bg-base-200" />
                </x-slot:prepend>
            </x-input>

            <x-input label="Append a button">
                <x-slot:append>
                    {{-- Add `rounded-s-none` class (RTL support) --}}
                    <x-button label="I am a button" icon="o-check" class="btn-primary rounded-s-none" />
                </x-slot:append>
            </x-input>

        @endverbatim
    </x-code>
</div>
