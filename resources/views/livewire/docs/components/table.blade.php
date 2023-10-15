<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Support\Arr;
use Mary\Traits\Toast;

new #[Title('Table')] class extends Component {
    use Toast;

    public array $selected = [1, 3];

    public array $expanded = [2];

    public function delete()
    {
        sleep(1);
    }

    function save()
    {
        $this->success("Checked IDs: " . Arr::join(Arr::sort($this->selected), ', '));
    }
}
?>

<div class="docs">
    <x-header title="Table" with-anchor />

    <x-header title="Simple" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(5)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'name', 'label' => 'Nice Name'],
                    ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
                ];
            @endphp

            {{-- You can use any `$wire.METHOD` on `@row-click` --}}
            <x-table :headers="$headers" :rows="$users" striped @row-click="alert($event.detail.name)" />
        @endverbatim
    </x-code>

    <x-header title="No headers" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(2)->get();

                $headers = [
                    ['key' => 'name', 'label' => 'Name'],
                    ['key' => 'city.name', 'label' => 'City'],
                ];
            @endphp

            {{-- Notice `no-headers` --}}
            <x-table :headers="$headers" :rows="$users" no-headers />
        @endverbatim
    </x-code>

    <x-header title="Header slot" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can override any header by using <code>&#x40;scope('header_XXX', $header)</code> special blade directive,
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

    <x-header title="Row slot" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can override any row by using <code>&#x40;scope('row_XXX', $row)</code> special blade directive, in which <code>XXX</code> is any <code>key</code> from
        <code>$headers</code> config object.
    </p>
    <p>
        It injects current <code>$row</code> from the loop's context and achieves the same behavior that you would expect from the Vue/React components.
    </p>
    <p>
        <strong>Notice that you do not need to override all the attributes.</strong>
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

    <x-header title="Row selection" with-anchor size="text-2xl" class="mt-10 mb-5" />

    <p>
        Use <code>selectable</code> attribute in conjunction with <code>wire:model</code> to manage selection state.
    </p>

    <x-code no-render language="php">
        public array $selected = [1, 3];
    </x-code>

    <br>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(3)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
                    ['key' => 'name', 'label' => 'Nice Name'],
                ];
            @endphp

            {{-- Notice `selectable` and `wire:model` --}}
            {{-- See `@row-selection` output on console  --}}
            {{-- You can use any `$wire.METHOD` on `@row-selection` --}}
            <x-table
                :headers="$headers"
                :rows="$users"
                wire:model="selected"
                selectable
                @row-selection="console.log($event.detail)" />

            <x-button label="Save" icon="o-check" wire:click="save" spinner />
        @endverbatim
    </x-code>

    <p>
        By default, it will look up for <code>$row->id</code> attribute. You can customize this with <code>selectable-key</code> attribute.
    </p>

    <x-code no-render>
        @verbatim('docs')
            {{-- Uses `$row->mycode` as selection key --}}
            <x-table ... selectable selectable-key="mycode" />
        @endverbatim
    </x-code>

    <x-header title="Row expansion" with-anchor size="text-2xl" class="mt-10 mb-5" />
    <p>
        Use <code>expandable</code> attribute in conjunction with <code>wire:model</code> to manage expansion state.
    </p>

    <x-code no-render language="php">
        public array $expanded = [2];
    </x-code>

    <br>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(3)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'hidden'],
                    ['key' => 'name', 'label' => 'Nice Name'],
                ];
            @endphp

            {{-- Notice `expandable` and `wire:model` --}}
            <x-table :headers="$headers" :rows="$users" wire:model="expanded" expandable>

                {{-- Special `expansion` slot --}}
                @scope('expansion', $user)
                    <div class="bg-yellow-50 p-8 font-bold">
                        Hello, {{ $user->name }}!
                    </div>
                @endscope

            </x-table>

        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        By default, it will look up for <code>$row->id</code> attribute. You can customize this with <code>expandable-key</code> attribute.
    </p>

    <x-code no-render>
        @verbatim('docs')
            {{-- Uses `$row->mycode` as expandable key --}}
            <x-table ... expandable expandable-key="mycode" />
        @endverbatim
    </x-code>
</div>
