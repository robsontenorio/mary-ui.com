<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title('Menu')]
#[Layout('layouts.app', ['description' => 'Livewire UI menu item component with submenus, link, icons, badge, automatic active state per route and customizable slots.'])]
class extends Component {
}
?>

<div class="docs">
    <x-anchor title="Menu" />

    <p>
        This component plays nice with <a href="/docs/components/dropdown" wire:navigate>Dropdown</a> and <a href="/docs/layout" wire:navigate>Layout</a>`s
        sidebar slot.
    </p>

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10 !w-64">
                <x-menu-item title="Home" icon="o-home" />
                <x-menu-item title="Messages" icon="o-envelope" />
                <x-menu-item title="My settings" icon="o-bolt" />
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Customising" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10 !w-64">
                <x-menu-item title="Home" icon="o-home" class="text-secondary" icon-classes="text-secondary" />
                <x-menu-item title="Messages" icon="o-envelope" badge="1" badge-classes="badge-soft badge-error" />
                <x-menu-item title="My settings" icon="o-bolt" badge="new" badge-classes="float-right" />
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Links" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10">
                {{-- Default --}}
                <x-menu-item title="Internal link" icon="o-arrow-down" link="/docs/components/alert" />

                {{-- Notice `external` --}}
                <x-menu-item title="External link" icon="o-arrow-uturn-right" link="https://google.com" external />

                {{-- Notice `no-wire-navigate` --}}
                <x-menu-item title="Internal without wire:navigate" icon="o-power" link="/docs/components/menu" no-wire-navigate />
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Separator and Sub-menus" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10 !w-64">
                <x-menu-item title="Hello" />
                <x-menu-item title="There" />

                <x-menu-separator />

                <x-menu-sub title="Settings" icon="o-cog-6-tooth" icon-classes="text-warning">
                    <x-menu-item title="Wifi" icon="o-wifi" />
                    <x-menu-item title="Archives" icon="o-archive-box" />
                </x-menu-sub>

                <x-menu-separator />

                <x-menu-item title="Wifi" icon="o-wifi" />
            </x-menu>
        @endverbatim
    </x-code-example>

    <p>
        You can manually force the submenu keep open.
    </p>

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10 !w-64">
                <x-menu-sub title="Home" icon="o-home">
                    <x-menu-item title="Users" icon="o-user" />
                    <x-menu-item title="Folders" icon="o-folder" />
                </x-menu-sub>

                {{-- Force with `open` --}}
                <x-menu-sub title="Settings" icon="o-cog-6-tooth" open>
                    <x-menu-item title="Wifi" icon="o-wifi" />
                    <x-menu-item title="Archives" icon="o-archive-box" />
                </x-menu-sub>
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Hidden & Disabled" size="text-xl" class="mt-14" />
    <p>
        You can control the visibility of menus with the <code>hidden</code> attribute,
        or keep it visible but with a <code>disabled</code> state.
    </p>

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10">
                <x-menu-item title="Users" icon="o-user" />
                <x-menu-item title="Folders" icon="o-folder" hidden />
                <x-menu-item title="Events" icon="o-bolt" disabled />

                <x-menu-sub title="Settings" icon="o-cog-6-tooth" disabled>
                    <x-menu-item title="Wifi" icon="o-wifi" />
                    <x-menu-item title="Archives" icon="o-archive-box" />
                </x-menu-sub>
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Manual active state" size="text-xl" class="mt-14" />

    <p>
        You can manually define the active menu item by placing <code>active</code> attribute.
    </p>

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10">
                <x-menu-item title="Hey" />

                {{-- Notice `active` --}}
                <x-menu-item title="Hi" active />

                <x-menu-item title="You" />
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Automatic active state" size="text-xl" class="mt-14" />

    <p>
        You can automatically activate a menu item when current route matches the base <code>link</code>
        and its nested route variations by using the <code>activate-by-route</code> attribute.
    </p>
    <p>
        For example, <code>link="/users"</code> will activate same menu item when you deep navigate for these routes:
    </p>
    <ul>
        <li><strong>/users</strong></li>
        <li><strong>/users/</strong>23</li>
        <li><strong>/users/</strong>23/edit</li>
        <li><strong>/users/</strong>23/create</li>
        <li><strong>/users/</strong>?q=mary</li>
        <li><strong>/users/</strong>[anything]</li>
    </ul>

    <br>

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            {{-- Notice `activate-by-route` --}}
            <x-menu activate-by-route class="border border-base-content/10">
                {{-- It is active because you are right now browsing this url --}}
                <x-menu-item title="Menu component" link="/docs/components/menu" />

                <x-menu-item title="Party" />
            </x-menu>

        @endverbatim
    </x-code-example>

    <p>
        If you use Laravel named routes, combine with the <code>route</code> param that matches the named route.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <x-menu activate-by-route>
                <x-menu-sub title="Attendance">
                    <x-menu-item title="Start" link="{{ route('attendance.index') }}" route="attendance.index" />
                    <x-menu-item title="View" link="{{ route('attendance.list') }}" route="attendance.list" />
                    <x-menu-item title="Inbox" route="messages" :route-params="['folder' => 'inbox']" />
                </x-menu-sub>
            </x-menu>
        @endverbatim
    </x-code-example>

    <p>
        If for some reason you need to use "conflicting" routes on main menu.
        Use the attribute <code>exact</code> to handle it properly.
        Although it is not recommended to have this kind of route on the main menu, you have this option.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            <x-menu activate-by-route>
                {{-- Notice `exact` --}}
                <x-menu-item title="Something 10" link="/something/10" exact />
                <x-menu-item title="Something 101" link="/something/101" exact />
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Custom style" size="text-xl" class="mt-14" />

    <p>
        You can define any style for the current active menu with <code>active-bg-color</code>.
        Also, for each menu item you can freely place any CSS.
    </p>

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            {{-- We use this style on maryUI docs --}}
            <x-menu activate-by-route active-bg-color="font-black" class="border border-base-content/10 !w-64">
                <x-menu-item title="Hello" />
                <x-menu-item title="There" />

                <x-menu-separator />

                <x-menu-sub title="Docs" icon="o-book-open">
                    <x-menu-item title="Table" />
                    <x-menu-item title="Menu" link="/docs/components/menu" />
                </x-menu-sub>
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Slots" size="text-xl" class="mt-14" />

    <x-code-example class="grid gap-5 justify-center">
        @verbatim('docs')
            <x-menu class="border border-base-content/10 !w-64">
                <x-menu-item>
                    My <b>settings</b>
                </x-menu-item>
            </x-menu>
        @endverbatim
    </x-code-example>

    <x-anchor title="Cloud providers" size="text-xl" class="mt-14" />

    <p>
        Some cloud providers put your app behind a proxy and force all routes to <strong>https</strong>.
        Here is a solution to trust proxies and make <code>activate-by-route</code> attribute work as expected.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        Example of solution.
    </x-alert>

    {{--@formatter:off--}}
    <x-code-example language="php" no-render>
        @verbatim('docs')
            // bootstrap/app.php

            return Application::configure(basePath: dirname(__DIR__))
                ...
                ->withMiddleware(function (Middleware $middleware) {
                    $middleware->trustProxies(at: '*');   // [tl! highlight]
                })
                ...
    @endverbatim
    </x-code-example>
    {{--@formatter:on--}}
</div>
