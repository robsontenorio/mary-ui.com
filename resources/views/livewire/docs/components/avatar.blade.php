<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Mary\View\Components\Avatar;

new
#[Title('Avatar')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI avatar component with icon, title and subtitle'])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Avatar" />

    <x-code class="grid lg:grid-cols-2 gap-8">
        @verbatim('docs')
            @php
                $user = App\Models\User::first();
            @endphp

            <x-avatar :image="$user->avatar" />

            {{-- Manipulate avatar imagem with CSS classes --}}
            <x-avatar :image="$user->avatar" class="!w-14 !rounded-lg" />

            {{-- Title --}}
            <x-avatar :image="$user->avatar" :title="$user->username" />

            {{-- Subtitle --}}
            <x-avatar :image="$user->avatar" :title="$user->username" :subtitle="$user->name" class="!w-10" />

            {{-- Placeholder --}}
            <x-avatar placeholder="RT" title="Robson Tenório" subtitle="@robsontenorio" class="!w-10" />
        @endverbatim
    </x-code>

    <x-anchor title="Slots" size="text-2xl" class="mt-10 !mb-5" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            @php
                $user = App\Models\User::first();
            @endphp

            <x-avatar :image="$user->avatar" class="!w-24">

                <x-slot:title class="text-3xl pl-2">
                    {{ $user->username }}
                </x-slot:title>

                <x-slot:subtitle class="text-gray-500 flex flex-col gap-1 mt-2 pl-2">
                    <x-icon name="o-paper-airplane" label="12 posts" />
                    <x-icon name="o-chat-bubble-left" label="45 comments" />
                </x-slot:subtitle>

            </x-avatar>
        @endverbatim
    </x-code>

    <hr class="my-10" />
    <x-anchor title="API" size="text-2xl" class="mt-10 !mb-5" />
    <x-api-generator :class-name="Avatar::class" />
    <div class="mb-64"></div>
</div>
