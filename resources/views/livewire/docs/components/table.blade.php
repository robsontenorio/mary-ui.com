<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use Mary\Traits\Toast;

new
#[Title('Table')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI table component with pagination, row selection, expandable row and customizable slots.'])]
class extends Component {
    use Toast, WithPagination;

    public array $selected = [1, 3];

    public array $expanded = [2];

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public function delete()
    {
        sleep(1);
    }

    function save()
    {
        $this->success("Checked IDs: " . Arr::join(Arr::sort($this->selected), ', '));
    }

    public function users(): Collection
    {
        return User::query()
            ->with('city')
            ->withAggregate('city', 'name')
            ->orderBy(...array_values($this->sortBy))
            ->take(3)
            ->get();
    }

    public function with(): array
    {
        return [
            'users' => $this->users()
        ];
    }
}
?>

<div class="docs">
    <x-anchor title="Table" />

    <x-anchor title="Simple" size="text-2xl" class="mt-10 mb-5" />

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

    <x-anchor title="No headers" size="text-2xl" class="mt-10 mb-5" />

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

    <x-anchor title="Click to navigate" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The following <code>{tokens}</code> will be replaced by actual values <strong>on each row</strong> based on any <code>key</code>
        from <code>$headers</code> config object.
    </p>
    <p>
        Some examples:
    </p>
    <ul>
        <li><code>/users/{id}</code></li>
        <li><code>/users/profile/{username}/?&admin=true</code></li>
        <li><code>/users/{id}/?from={city.name}</code></li>
    </ul>

    <br>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(2)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#'],
                    ['key' => 'username', 'label' => 'Username'],
                    ['key' => 'city.name', 'label' => 'City'],
                ];
            @endphp

            {{-- Notice `link` --}}
            {{-- Check browser url on next page --}}
            <x-table :headers="$headers" :rows="$users" link="/docs/installation/?from={username}" />
        @endverbatim
    </x-code>

    <x-anchor title="Sort" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Declare a property <code>$sortBy</code> within following pattern bellow.
        It will be updated when you click on table headers.
        So, you can use it to order your query.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

        public function users(): Collection
        {
            return User::query()
                ->orderBy(...array_values($this->sortBy))
                ->take(3)
                ->get();
        }
    </x-code>
    {{--@formatter:on--}}

    <br>
    <p>
        By default, <strong>all columns</strong> will be sortable. Check the following example to <strong>disable sorting</strong> on specific columns.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $users = $this->users();  // [tl! .docs-hide]
                $sortBy = $this->sortBy;                // [tl! .docs-hide]
                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'w-16'],
                    ['key' => 'name', 'label' => 'Name', 'class' => 'w-72'],
                    ['key' => 'email', 'label' => 'E-mail', 'sortable' => false], // <--- Won't be sortable
                ];
            @endphp

            {{-- Notice `sort-by` --}}
            <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy" />

        @endverbatim
    </x-code>

    <br>
    <p>
        If you plan to sort on relationship fields, consider using <code>withAggregate()</code> Eloquent method.
        It will add an extra column on result.
    </p>

    <x-code no-render language="php">
        @verbatim('docs')
            // It will add an extra column `city_name` on User collection
            User::withAggregate('city', 'name')-> ...
        @endverbatim
    </x-code>
    <x-code>

        @verbatim('docs')
            @php
                $users = $this->users();  // [tl! .docs-hide]
                $sortBy = $this->sortBy;                // [tl! .docs-hide]
                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'w-16'],
                    ['key' => 'name', 'label' => 'Name', 'class' => 'w-72'],
                    ['key' => 'city_name', 'label' => 'City'], // <--- Notice 'city_name' syntax
                ];
            @endphp

            {{-- Notice `sort-by` --}}
            <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy" />

        @endverbatim
    </x-code>

    <br>

    <p>
        In the following example we need <code>City</code> as complex object to use it in a custom slot.
        But, it must be sorted by a custom column. So we make use of same approach of <code>withAggregate</code> combined with a <code>sortBy</code> per column.
    </p>

    <x-code no-render language="php">
        @verbatim('docs')
            // It will add an extra column `city_name` on User collection
            User::withAggregate('city', 'name')-> ...
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $users = $this->users();  // [tl! .docs-hide]
                $sortBy = $this->sortBy;                // [tl! .docs-hide]
                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'w-16'],
                    ['key' => 'name', 'label' => 'Name', 'class' => 'w-72'],
                    ['key' => 'city', 'label' => 'City', 'sortBy' => 'city_name'], // <--- Notice 'sortBy'
                ];
            @endphp

            {{-- You will learn about custom slots on next sections --}}
            <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy">
                @scope('cell_city', $user)
                    <x-badge :value="$user->city->name" class="badge-primary" />
                @endscope
            </x-table>

        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Pagination" size="text-2xl" class="mt-10 mb-5" />

    <p>
        MaryUI uses directly all features offered by Laravel and Livewire itself, including default pagination links and deeper customizations.
        For further details, please, refer to their docs.
    </p>

    <p>
        As described on <a href="https://laravel.com/docs/10.x/pagination" target="_blank">Laravel docs</a> you need to adjust your <code>tailwind.config.js</code>
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="javascript">
        content: [
            // Add this [tl! highlight .animate-bounce]
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        ],
    </x-code>
    {{--@formatter:on--}}

    <p>
        Then, use <code>WithPagination</code> trait from Livewire itself, as described on
        <a href="https://livewire.laravel.com/docs/pagination#basic-usage" target="_blank">Livewire docs</a>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        use Livewire\WithPagination;

        class ShowUsers extends Component
        {
            use WithPagination;
        }
    </x-code>
    {{--@formatter:on--}}

    <br>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::paginate(3);

                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
                    ['key' => 'name', 'label' => 'Nice Name'],
                ];
            @endphp

            {{-- Notice `with-pagination` --}}
            <x-table :headers="$headers" :rows="$users" with-pagination />

        @endverbatim
    </x-code>

    <br>

    <p>
        Here are some useful styles to add on <code>app.css</code>. Notice this is about default classes provided by Laravel paginator links <strong>not maryUI itself</strong>.
        Fell free to change it.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="css">
        /* Active page highlight */
        .mary-table-pagination span[aria-current="page"] > span {
            @apply bg-primary text-base-100
        }

        /* For dark mode*/
        .mary-table-pagination span[aria-disabled="true"] span {
            @apply bg-inherit
        }

        /* For dark mode*/
        .mary-table-pagination button {
            @apply bg-base-100
        }
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Header slot" size="text-2xl" class="mt-10 mb-5" />

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

    <x-anchor title="Cell slot" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can override any row by using <code>&#x40;scope('cell_XXX', $row)</code> special blade directive, in which <code>XXX</code> is any <code>key</code> from
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

    <x-anchor title="Row selection" size="text-2xl" class="mt-10 mb-5" />

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

    <x-anchor title="Row expansion" size="text-2xl" class="mt-10 mb-5" />
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
                    <div class="bg-base-200 p-8 font-bold">
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
