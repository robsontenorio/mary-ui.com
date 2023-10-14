<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Table')] class extends Component {
    public function delete()
    {
        sleep(1);
    }
}
?>

<div class="docs">
    <x-header title="Table" with-anchor />

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(3)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'name', 'label' => 'Nice Name'],
                    ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
                ];
            @endphp

            {{-- You can use any `$wire.METHOD` on `@row-click` --}}
            <x-table
                :headers="$headers"
                :rows="$users"
                striped
                @row-click="alert($event.detail.name)" />
        @endverbatim
    </x-code>

    <x-header title="Header slots" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can override any header by using <code>&#x40;scope('header_XXX', $header)</code> slot helper's blade directive,
        in which <code>XXX</code> is any <code>key</code> from <code>$headers</code> config object.
    </p>

    <br>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(2)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'bg-red-100'], # <--- custom CSS
                    ['key' => 'name', 'label' => 'Nice Name'],
                    ['key' => 'city.name', 'label' => 'City'], # <---- nested attributes
                ];
            @endphp

            <x-table :headers="$headers" :rows="$users">
                {{-- Overrides `name` header --}}
                @scope('header_name', $header)
                    {{ $header['label'] }} <x-icon name="s-question-mark-circle" />
                @endscope

                {{-- Overrides `city.name` header --}}
                @scope('header_city.name', $header)
                    <u>{{ $header['label'] }}</u>
                @endscope
            </x-table>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-header title="Row slots" with-anchorsize="text-2xl" class="mt-10 mb-5" />

    <p>
        You can override any row by using <code>&#x40;scope('row_XXX', $row)</code> slot helper's blade directive, in which <code>XXX</code> is any <code>key</code> from
        <code>$headers</code> config object.
    </p>
    <p>
        It injects current <code>$row</code> from the loop's context and achieves the same behavior that you would expect from the Vue/React components.
    </p>
    <p>
        Notice that you do not need to override all the attributes.
    </p>

    <br>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(3)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'name', 'label' => 'Nice Name'],
                    ['key' => 'city.name', 'label' => 'City'],      # <-- nested attributes
                    ['key' => 'fakeColumn', 'label' => 'Fake City'] # <-- this column does not exists
                ];
            @endphp

            <x-table :headers="$headers" :rows="$users">

                {{-- Notice `$user` is the current row item on loop --}}
                @scope('cell_id', $user)
                    <strong>{{ $user->id }}</strong>
                @endscope

                {{-- You can name the injected object as you wish  --}}
                @scope('cell_name', $stuff)
                    <x-badge :value="$stuff->name" class="badge-info" />
                @endscope

                {{-- Notice the `dot` notation for nested attribute cell's slot --}}
                @scope('cell_city.name', $user)
                    <i>{{ $user->city->name }}</i>
                @endscope

                {{-- The `fakeColumn` does not exist to the actual object --}}
                @scope('cell_fakeColumn', $user)
                    <u>{{ $user->city->name }}</u>
                @endscope

                {{-- Special `actions` slot --}}
                @scope('actions', $user)
                    <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
                @endscope

            </x-table>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}
</div>
