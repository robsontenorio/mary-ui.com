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

    public int $perPage = 3;

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

    <x-anchor title="No headers & No hover" size="text-2xl" class="mt-10 mb-5" />

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
            <x-table :headers="$headers" :rows="$users" no-headers no-hover />
        @endverbatim
    </x-code>

    <x-anchor title="Formatters" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The table component includes the basic <code>date</code> and <code>currency</code> formatters. You can also use a <code>closure</code> to make any kind of transformation.
    </p>
    <p>
        For more complex scenarios you can use the <code>cell slot</code> described on the next sections.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::take(2)->get();

                $headers = [
                    ['key' => 'name', 'label' => 'Name'],
                    //
                    ['key' => 'created_at', 'label' => 'Date', 'format' => ['date', 'd/m/Y']],

                    // It calls number_format()
                    // The first parameter represents all parameters in order for `number_format()` function
                    // The  second parameter is any string to prepend (optional)
                    ['key' => 'salary', 'label' => 'Salary', 'format' => ['currency', '2,.', 'R$ ']],

                    // A closure that has the current row and field value itself
                    ['key' => 'is_employee', 'label' => 'Employee?', 'format' => fn($row, $field) => $field ? 'Yes' : 'No'],
                ];
            @endphp

            {{-- Notice `no-headers` --}}
            <x-table :headers="$headers" :rows="$users" />
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

    <p>
        The above approach makes puts a <code>href</code> on each cell. You can disable it for specific columns by setting <code>disableLink</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        $headers = [
            ...
            ['key' => 'city.name', 'label' => 'City', 'disableLink' => true], // <--- Here!
        ];
    </x-code>
    {{--@formatter:on--}}

    <p>
        You can also use the below special notation to link to specific route.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-table
                :headers="$headers"
                :rows="$users"
                :link="route('users.show', ['username' => ['username'], 'id' => ['id']])"
            />
        @endverbatim
    </x-code>

    <x-anchor title="Header classes" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Any class set on <code>$headers</code> will be applied to respective columns.
        You can also control columns visibility using Tailwind responsive breakpoints. Resize this window to see it.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                use App\Models\User;            // [tl! .docs-hide]
                $users = User::take(3)->get();

                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'bg-red-500/20 w-1'],
                    ['key' => 'username', 'label' => 'Username'],
                    ['key' => 'email', 'label' => 'E-mail', 'class' => 'hidden lg:table-cell'], // Responsive
                    ['key' => 'bio', 'label' => 'Bio', 'hidden' => 'true'], // Alternative approach
                ];
            @endphp

            <x-table :headers="$headers" :rows="$users"  />
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Row and cell decoration" size="text-2xl" class="mt-10 mb-5" />

    <p>
        It is possible to define custom logic to apply background colors, or any class, on rows and/or cells.
        Remember to configure <strong>Tailwind safelist</strong> to compile dynamic css classes you are using.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                use App\Models\User;            // [tl! .docs-hide]
                $users = User::take(3)->get();

                // Considering this scenario
                $users[0]->isAdmin = true;
                $users[0]->isInactive = true;

                $users[1]->isAdmin = true;
                $users[1]->isInactive = false;

                $users[2]->isAdmin = false;
                $users[2]->isInactive = true;

                $headers = [
                    ['key' => 'name', 'label' => 'Nice Name'],
                    ['key' => 'username', 'label' => 'Username'],
                ];

                // The `item` will be injected on current loop context.
                // You can apply any logic to define what class will be applied.
                // If more than one condition is `true` the respective classes will be merged.

                $row_decoration = [
                    'bg-yellow-500/25' => fn(User $user) => $user->isAdmin,
                    'text-red-500' => fn(User $user) => $user->isAdmin && $user->isInactive,
                    'underline font-bold' => fn(User $user) => $user->isInactive // <-- combined classes
                ];
            @endphp

            <x-table :headers="$headers" :rows="$users" :row-decoration="$row_decoration" />
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        You can do the same for cells.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                use App\Models\User;            // [tl! .docs-hide]
                $users = User::take(3)->get();

                // Considering this scenario
                $users[0]->isAdmin = true;
                $users[0]->isInactive = true;
                $users[0]['city']->isAvailable = true;
                $users[1]['city']->isAvailable = false;


                $headers = [
                    ['key' => 'name', 'label' => 'Nice Name'],
                    ['key' => 'username', 'label' => 'Username'],
                    ['key' => 'city.name', 'label' => 'City'],
                ];

                // Use the same `headers key`.
                // The `item` will be injected on current loop context.
                // You can apply any logic to define what class will be applied.
                // If more than one condition is `true` the respective classes will be merged.

                $cell_decoration = [
                    'city.name' => [
                        'bg-yellow-500/25 underline' => fn(User $user) => !$user->city->isAvailable,
                    ],
                    'username' => [
                        'text-yellow-500' => fn(User $user) => $user->isAdmin,
                        'bg-dark-300' => fn(User $user) => $user->isInactive
                    ]
                ];
            @endphp

            <x-table :headers="$headers" :rows="$users" :cell-decoration="$cell_decoration" />
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

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
        Notice maryUI uses directly all features offered by Laravel and Livewire itself, including default pagination links and deeper customizations.
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

    <br>

    <p>
        You also can control the number of items per page by using the <code>per-page</code> attribute, as well the displayed values using <code>per-page-values</code>.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Pagination is tricky! See an example of an potential issue and how to fix it at <a href="https://mary-ui.com/bootcamp/03#pagination">Bootcamp</a>.
    </x-alert>

    <x-code>
        @verbatim('docs')
            @php
                $perPage = $this->perPage;  // [tl! .docs-hide]
                // Remember to define a model to bind the value
                // public int $perPage = 3;

                // Also use it here.
                $users = App\Models\User::paginate($this->perPage);

                $headers = [
                    ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
                    ['key' => 'name', 'label' => 'Nice Name'],
                ];
            @endphp

            <x-table
                :headers="$headers"
                :rows="$users"
                with-pagination
                per-page="perPage"
                :per-page-values="[3, 5, 10]" {{-- Notice the `:` bind --}}
            />

        @endverbatim
    </x-code>

    <br>

    <p>
        MarUI also provides its own pagination component. You can use it with other components, so it is not limited to tables.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                // Remember to define a model to bind the value
                $users = App\Models\User::paginate($this->perPage);
            @endphp

            @foreach($users as $user)
                <div class="bg-base-200 p-2 my-3 rounded">{{ $user->name }}</div>
            @endforeach

            {{-- The pagination component --}}
            <x-pagination :rows="$users" wire:model.live="perPage" />
        @endverbatim
    </x-code>

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
                    ['key' => 'id', 'label' => '#', 'class' => 'bg-red-500/20'], # <--- custom CSS
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

    <x-anchor title="Inject external variables" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can inject any external variables into any <strong>cell scope</strong> like this.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(3)->get(); // [tl! .docs-hide]
                $headers = [['key' => 'name', 'label' => 'Name']]; // [tl! .docs-hide]
                $some = 1;
                $thing = 2;
            @endphp

            <x-table :headers="$headers" :rows="$users">
                {{-- The `$user` viariable is the injected automatically from the current loop context --}}
                {{-- You can pass any extra arbitrary variables after that --}}
                @scope('cell_name', $user, $some, $thing)
                    {{ $user->name }} - {{ $some }} - {{ $thing }}
                @endscope
            </x-table>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Loop context" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can access the <a href="https://laravel.com/docs/10.x/blade#the-loop-variable" target="_blank">loop context</a>
        on cell scopes through <code>$loop</code> variable.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $users = App\Models\User::with('city')->take(3)->get();

                $headers = [
                    ['key' => 'name', 'label' => 'Nice Name'],
                ];
            @endphp

            <x-table :headers="$headers" :rows="$users">
                @scope('cell_name', $user)
                    ({{  $loop->index }}) {{ $user->name }}
                @endscope
            </x-table>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Empty Slot" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can customize the empty text message by using one of the following approaches.
    </p>

    <x-code class="grid gap-10">
        @verbatim('docs')
            @php                                                    // [tl! .docs-hide]
                $users = [];                                        // [tl! .docs-hide]
                $headers = [                                        // [tl! .docs-hide]
                    ['key' => 'name', 'label' => 'Nice Name'],      // [tl! .docs-hide]
                    ['key' => 'email', 'label' => 'E-mail'],        // [tl! .docs-hide]
                    ['key' => 'bio', 'label' => 'Bio'],             // [tl! .docs-hide]
                    ['key' => 'city.name', 'label' => 'City'],      // [tl! .docs-hide]
                ];                                                  // [tl! .docs-hide]
            @endphp                                                 <!-- [tl! .docs-hide] -->
            <x-table :headers="$headers" :rows="$users" show-empty-text />

            <x-table :headers="$headers" :rows="$users" show-empty-text empty-text="Nothing Here!" />

            <x-table :headers="$headers" :rows="$users">
                <x-slot:empty>
                    <x-icon name="o-cube" label="It is empty." />
                </x-slot:empty>
            </x-table>
        @endverbatim
    </x-code>

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

    <p>
        You can also control the expansion icon visibility by using <code>expandable-condition</code> attribute.
    </p>

    <x-code no-render>
        @verbatim('docs')
            {{-- It will check each row for the `is_admin` field --}}
            <x-table ... expandable expandable-condition="is_admin" />
        @endverbatim
    </x-code>
</div>
