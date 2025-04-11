<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new
#[Title('Toast')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI toast component with title, description and redirect support.'])]
class extends Component {
    use Toast;

    public function save()
    {
        // Your stuff here ...

        // Toast
        $this->success('We are done, check it out');
    }

    public function save2()
    {
        // Your stuff here ...

        // Toast
        $this->error(
            'It will last just 1 second ...',
            timeout: 1000,
            position: 'toast-bottom toast-start'
        );
    }

    public function save3()
    {
        // Your stuff here ...

        // Toast
        $this->warning(
            'It is working with redirect',
            'You were redirected to another url ...',
            redirectTo: '/docs/components/form'
        );
    }

    public function save4()
    {
        // Your stuff here ...

        // Toast
        $this->warning(
            'Wishlist <u>updated</u>',
            'You will <strong>love it :)</strong>',
            position: 'bottom-end',
            icon: 'o-heart',
            css: 'bg-pink-500 text-base-100'
        );
    }
}
?>

<div class="docs">

    <x-anchor title="Toast" />

    <x-anchor title="Usage" size="text-xl" class="mt-14" />

    <p>
        Place <strong>toast tag</strong> anywhere on the main layout.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render>
        @verbatim('docs')
            <body>
                ...
                <x-toast />  <!-- [tl! highlight .animate-bounce] -->
            </body>
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        Import the <code>Toast</code> trait and call the <code>$this->toast(...)</code> method.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            use Mary\Traits\Toast;

            class MyComponent extends Component
            {
                // Use this trait [tl! highlight:1 .animate-bounce]
                use Toast;

                public function save()
                {
                    // Do your stuff here ...

                    // Toast
                    $this->toast(
                        type: 'success',
                        title: 'It is done!',
                        description: null,                  // optional (text)
                        position: 'toast-top toast-end',    // optional (daisyUI classes)
                        icon: 'o-information-circle',       // Optional (any icon)
                        css: 'alert-info',                  // Optional (daisyUI classes)
                        timeout: 3000,                      // optional (ms)
                        redirectTo: null                    // optional (uri)
                    );

                    // Shortcuts
                    $this->success(...);
                    $this->error(...);
                    $this->warning(...);
                    $this->info(...);
                }
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        For convenience this component flashes the following messages to make testing easier.
    </p>

    <x-code-example no-render language="php">
        session()->flash('mary.toast.title', $title);
        session()->flash('mary.toast.description', $description);
    </x-code-example>

    <x-anchor title="Example" size="text-xl" class="mt-14" />

    <p>
        The shortcuts are branded with default colors and icons.
    </p>

    <x-code-example class="grid lg:flex gap-5">
        @verbatim('docs')
            <x-button label="Default" class="btn-success" wire:click="save" spinner />

            <x-button label="Quick" class="btn-error" wire:click="save2" spinner />

            <x-button label="Save and redirect" class="btn-warning" wire:click="save3" spinner />
        @endverbatim
    </x-code-example>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            public function save()
            {
                // Your stuff here ...

                // Toast
                $this->success('We are done, check it out');
            }

            public function save2()
            {
                // Your stuff here ...

                // Toast
                $this->error(
                    'It will last just 1 second ...',
                    timeout: 1000,
                    position: 'toast-bottom toast-start'
                );
            }

            public function save3()
            {
                // Your stuff here ...

                // Toast
                $this->warning(
                    'It is working with redirect',
                    'You were redirected to another url ...',
                    redirectTo: '/docs/components/form'
                );
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Default position" size="text-xl" class="mt-14" />

    <p>
        The default position is <code>toast-top toast-end</code>. You can change it by passing the <code>position</code> parameter.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render>
        @verbatim('docs')
            <body>
                ...
                <x-toast position="toast-top toast-center" />
            </body>
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Custom style" size="text-xl" class="mt-14" />

    <p>
        You can use any daisyUI/Tailwind classes. It also supports HTML.
    </p>

    <x-code-example class="grid lg:flex gap-5">
        @verbatim('docs')
            <x-button label="Like" wire:click="save4" icon="o-heart" spinner />
        @endverbatim
    </x-code-example>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
            public function save4()
            {
                // Your stuff here ...

                // Toast
                $this->warning(
                    'Wishlist <u>updated</u>',
                    'You will <strong>love it :)</strong>',
                    position: 'bottom-end',
                    icon: 'o-heart',
                    css: 'bg-pink-500 text-base-100'
                );
            }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <x-anchor title="Using an Exception" size="text-xl" class="mt-14" />

    <p>
        The previous approach uses a Trait and works only inside Livewire components.
        If you are trying to trigger a toast from outside a Livewire context, you can use the <code>ToastException</code> to do so.
        This class has a number of shortcut functions to make it easier to use, and it's possible to overwrite all defaults.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
        use Mary\Exceptions\ToastException;

        public function notALivewireMethod()
        {
            throw ToastException::error('Your operation could not complete');

            // Shortcuts with the same API from Toast trait
            throw ToastException::success(...);
            throw ToastException::error(...);
            throw ToastException::warning(...);
            throw ToastException::info(...);
        }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

    <p>
        The livewire request hook <code>fail</code> method is used to handle the client side rendering of the toasts.
        If you already have hooks set up, the hook to render the toast will be called second.
    </p>
    <p>
        If you have a toast call in your existing hook, it will be de-bounced so only one call is used.
        The livewire fail hook is given a <code>preventDefault()</code> function to call if you wish to stop the event bubbling up,
        this behaviour is respected by the second hook configured by toast.
        If you want to disable this call, you can chain the <code>permitDefault()</code> method on your exception.
    </p>

    {{--@formatter:off--}}
    <x-code-example no-render language="php">
        @verbatim('docs')
        use Mary\Exceptions\ToastException;

        public function notALivewireMethod()
        {
            throw ToastException::info('Do not prevent default on client side')->permitDefault();
        }
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

</div>
