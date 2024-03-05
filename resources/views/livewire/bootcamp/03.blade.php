<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('maryUI Bootcamp - Listing users')]
#[Layout('components.layouts.bootcamp', ['description' => 'Move faster, code less. Get the job done.'])]
class extends Component {
}; ?>

<div class="docs">
    <x-anchor title="Listing users" />

    <p>
        As you can see on the existing <code>users/index.blade.php</code> example component you can already sort and filter, but the data it is hardcoded. Let's fix it now!
    </p>

    <x-anchor title="Table component" size="text-2xl" class="mt-10 mb-5" />

    <x-button label="Table docs" link="/docs/components/table" icon-right="o-arrow-up-right" external class="btn-outline btn-sm" />

    <img src="/bootcamp/03-a.png" class="rounded-lg border shadow-xl p-3 my-10" />

    <p>
        The <code>x-table</code> is a powerful component. You can easily display data, paginate, customize rows using slots, or make it sortable, clickable, selectable or
        expandable.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-table :headers="$headers" :rows="$users" />
        @endverbatim
    </x-code>

    <p>
        Let's replace <strong>entirely</strong> the <code>users()</code> method to make it use an Eloquent query.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        use Illuminate\Database\Eloquent\Builder;

        public function users(): Collection
        {
            return User::query()
                ->when($this->search, fn(Builder $q) => $q->where('name', 'like', "%$this->search%"))
                ->orderBy(...array_values($this->sortBy))
                ->get();
        }
    </x-code>
    {{--@formatter:on--}}

    <p>
        After this you can see all the users from the database.
        Notice the <code>users.age</code> column is empty because we have removed it from migrations. Let's fix it on next topic.
    </p>

    <x-anchor title="Sorting" size="text-2xl" class="mt-10 mb-5" />

    <p>
        As you noticed on example source code, we have a <code>$sortBy</code> property to control the sorting column and its direction.
        It works automatically when you click on table headers.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-table :headers="$headers" :rows="$users" :sort-by="$sortBy" ... />
        @endverbatim
    </x-code>

    <p>
        On our <code>$headers</code> property let's replace <code>age</code> column for <code>country.name</code> and refresh the page to see the result.
        Nice! Table component works with <strong>dot notation.</strong>
    </p>

    <x-code no-render language="php">
        @verbatim('docs')
            ['key' => 'age', 'label' => 'Age', 'class' => 'w-20'], // [tl! remove]
            ['key' => 'country.name', 'label' => 'Country'], // [tl! add]
        @endverbatim
    </x-code>

    <p>
        But, if you try to sort by the <code>country</code> column you get <strong>an error</strong>. Let's fix this using an Eloquent trick.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            // It will add an extra column `country_name` on User collection
            User::query()
                ->withAggregate('country', 'name') // [tl! highlight]
                -> ...
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    Finally, adjust the <code>headers</code> property to sort by the new custom column.

    <x-code no-render language="php">
        @verbatim('docs')
            ['key' => 'country.name', 'label' => 'Country'], // [tl! remove]
            ['key' => 'country_name', 'label' => 'Country'], // [tl! add]
        @endverbatim
    </x-code>

    <x-anchor title="Pagination" size="text-2xl" class="mt-10 mb-5" />

    <img src="/bootcamp/03-b.png" class="rounded-lg border shadow-xl p-3 my-10" />

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
        Go back to <code>users/index.blade</code> and use the <code>WithPagination</code> trait from Livewire itself as described on
        <a href="https://livewire.laravel.com/docs/pagination#basic-usage" target="_blank">Livewire docs</a>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        use Livewire\WithPagination; // [tl! highlight]

        new class extends Component
        {
            use WithPagination; // [tl! highlight]
        }
    </x-code>
    {{--@formatter:on--}}

    <p>
        Add the <code>with-pagination</code> property on <code>x-table</code> component.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-table ... with-pagination>
        @endverbatim
    </x-code>

    <p>
        Finally, make some changes to use an Eloquent paginated query. Notice the return type is changed.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        use Illuminate\Pagination\LengthAwarePaginator; // [tl! highlight]

        public function users(): LengthAwarePaginator // [tl! highlight]
        {
            return User::query()
                ->withAggregate('country', 'name')
                ->when($this->search, fn(Builder $q) => $q->where('name', 'like', "%$this->search%"))
                ->orderBy(...array_values($this->sortBy))
                ->paginate(5); // No more `->get()`  [tl! highlight]
        }
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Clear filters" size="text-2xl" class="mt-10 mb-5" />

    <p>
        There is a "bug" on pagination...
    </p>

    <ul>
        <li>Go to page 9.</li>
        <li>Filter by any name you see at that page.</li>
        <li>The list goes empty!</li>
    </ul>

    <p>
        Actually <strong>it is not a bug itself</strong>, but a Livewire pagination thing (not maryUI) you must be aware when you change filters.
    </p>

    <p>
        Let's fix using Livewire lifecycle hooks to reset pagination when any component property changes. Add the following method on the example component.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            // Reset pagination when any component property changes
            public function updated($property): void
            {
                if (! is_array($property) && $property != "") {
                    $this->resetPage();
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        You could improve the <code>clear()</code> method as well.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
        // Clear filters
        public function clear(): void
        {
            $this->reset();
            $this->resetPage(); // [tl! highlight]
            $this->success('Filters cleared.', position: 'toast-bottom');
        }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-alert icon="o-light-bulb" class="markdown">
        Pro tip: You could create a trait like <code>ClearsFilters</code> with those methods above to reuse the logic.
    </x-alert>

    <x-anchor title="Table CSS" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can apply CSS on table headers and make it responsive like this. Check it on mobile size.
    </p>

    <x-code no-render language="php">
        @verbatim('docs')
            ['key' => 'country_name', 'label' => 'Country'], // [tl! remove]
            ['key' => 'country_name', 'label' => 'Country', 'class' => 'hidden lg:table-cell'], // [tl! add]
        @endverbatim
    </x-code>

    <p>You can even decorate rows and cell with custom CSS, besides to use custom slots to override cells. You can do even more with maryUI tables. Check the docs for more.</p>

    <x-anchor title="Header component" size="text-2xl" class="mt-10 mb-5" />

    <x-button label="Header docs" link="/docs/components/header" icon-right="o-arrow-up-right" external class="btn-outline btn-sm" />

    <p>
        Check the example source code and see how useful <code>x-header</code> component is. It includes a progress indicator, has builtin layout
        and it is responsive. Check it on mobile size.
    </p>

    <x-code no-render>
        @verbatim('docs')
            {{-- Let's change the title --}}
            <x-header title="Users" separator progress-indicator ... />
        @endverbatim
    </x-code>

    <x-anchor title="Toast component" size="text-2xl" class="mt-10 mb-5" />

    <x-button label="Toast docs" link="/docs/components/toast" icon-right="o-arrow-up-right" external class="btn-outline btn-sm" />

    <p>
        The maryUI installer already set up <code>x-toast</code> for you.
    </p>
    <p>
        Let's replace <strong>entirely</strong> the <code>delete()</code> method.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        public function delete(User $user): void
        {
            $user->delete();
            $this->warning("$user->name deleted", 'Good bye!', position: 'toast-bottom');
        }
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Drawer component" size="text-2xl" class="mt-10 mb-5" />

    <x-button label="Drawer docs" link="/docs/components/drawer" icon-right="o-arrow-up-right" external class="btn-outline btn-sm" />

    <img src="/bootcamp/03-c.png" class="rounded-lg border shadow-xl p-3 my-10" />

    <p>
        The <code>x-drawer</code> component is a nice way to not interrupt the users flow, when it is necessary to quickly execute a secondary action.
        It comes with a handy close button and default layout.
    </p>

    <x-code no-render>
        @verbatim('docs')
            <x-drawer wire:model="drawer" title="Filters" right separator with-close-button ... />
        @endverbatim
    </x-code>

    <p>
        Let's add a new filter <strong>by country</strong>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use App\Models\Country;  // [tl! highlight]

            new class extends Component {
                ...

                // Create a public property.
                public int $country_id = 0; // [tl! highlight]

                // Add a condition to filter by country
                public function users(): LengthAwarePaginator
                {
                    ...
                    ->when(...)
                    ->when($this->country_id, fn(Builder $q) => $q->where('country_id', $this->country_id)) // [tl! highlight]
                    ...
                }

                // Add a new property
                public function with(): array
                {
                    return [
                        'users' => $this->users(),
                        'headers' => $this->headers(),
                        'countries' => Country::all(), // [tl! highlight]
                    ];
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Finally, place a <code>x-select</code> component inside the drawer, with this small CSS grid to make it look better.
    </p>

    <x-button label="Select docs" link="/docs/components/select" icon-right="o-arrow-up-right" external class="btn-outline btn-sm" />

    <x-code no-render>
        @verbatim('docs')
            <x-drawer ...>
                ...
                <div class="grid gap-5"> <!-- [tl! highlight] -->
                    <x-input placeholder="Search..." ... />
                    <x-select placeholder="Country" wire:model.live="country_id" :options="$countries" icon="o-flag" placeholder-value="0" /> <!-- [tl! highlight:1] -->
                </div>

            </x-drawer>
        @endverbatim
    </x-code>

    <x-anchor title="Challenge" size="text-2xl" class="mt-10 mb-5" />

    <x-button label="Button docs" link="/docs/components/button" icon-right="o-arrow-up-right" external class="btn-outline btn-sm" />

    <img src="/bootcamp/03-d.png" class="rounded-lg border shadow-xl p-3 my-10" />

    <p>
        If you are using a drawer probably you will have a few more filter options. In order to have a better UX it would be nice to show how many filters the user have selected.
    </p>

    <p>
        Tip: use the button <code>badge</code> property and an extra method on your component to count how many filters are filled.
    </p>

    <x-alert icon="o-light-bulb" class="markdown my-10">
        Before proceed, we recommend to make a local commit to keep track what is going on.
    </x-alert>

    <div class="flex justify-between mt-10">
        <x-button label="Installation" link="/bootcamp/02" icon="o-arrow-left" class="!no-underline btn-ghost" />
        <x-button label="Updating users" link="/bootcamp/04" icon-right="o-arrow-right" class="!no-underline btn-ghost" />
    </div>
</div>
