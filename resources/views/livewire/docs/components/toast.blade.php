<?php

use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component
{
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
            position: 'bottom-10 right-10'
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
}
?>

<div>
<x-markdown>
# Toast

### Usage

Just place @verbatim `<x-toast />` @endverbatim somewhere on your main app layout.

<x-code no-render>
@verbatim
<body>
    ...
    <x-toast />
</body>
@endverbatim
</x-code>

Import `Toast` trait and call `$this->toast(...)` method. 

<x-code no-render language="php">
@verbatim

use Mary\Traits\Toast;

class MyComponent extends Component
{
    // Use this trait
    use Toast;

    public function save()
    {
        // Do your stuff here ...

        // Toast
        $this->toast(
            type: 'success',
            title: 'It is done!',
            description: null,                  // optional (text)
            position: 'top-10 right-10',        // optional (Tailwind classes)
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
</x-code>

</x-markdown>

<x-markdown>
### Example 
</x-markdown>

<x-code class="grid lg:flex gap-5">
@verbatim
<x-button label="Default" class="btn-success" wire:click="save" spinner />

<x-button label="Quick" class="btn-error" wire:click="save2" spinner />

<x-button label="Save and redirect" class="btn-warning" wire:click="save3" spinner />
@endverbatim
</x-code>

<x-code no-render language="php">
@verbatim
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
        position: 'bottom-10 right-10'
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
</x-code>

</div>
