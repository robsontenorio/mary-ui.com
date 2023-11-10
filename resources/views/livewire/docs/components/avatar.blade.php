<?php

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

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
            <x-avatar :image="$user->avatar" class="w-14" />

            <x-avatar :image="$user->avatar" :title="$user->username" />

            <x-avatar
                :image="$user->avatar"
                :title="$user->username"
                :subtitle="$user->name"
                class="w-10 rounded-lg" />

            {{--  SLOTS --}}
            <x-avatar :image="$user->avatar" class="w-24">

                <x-slot:title class="text-3xl pl-2">
                    {{ $user->username }}
                </x-slot:title>

                <x-slot:subtitle class="text-inherit flex flex-col gap-1 mt-2 pl-2">
                    <x-icon name="o-paper-airplane" label="12 posts" />
                    <x-icon name="o-chat-bubble-left" label="45 comments" />
                </x-slot:subtitle>

            </x-avatar>
        @endverbatim
    </x-code>
</div>
