<?php

use Mary\Traits\Dialog;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

new
#[Title('Dialog')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI dialog component with title, description and confirmation support.'])]
class extends Component {
    use Dialog;

    public function showBasic()
    {
        // Your stuff here ...

        // Dialog
        $this->dialog(
            title: 'Basic Dialog',
            description: 'This is a basic dialog with default styling.'
        );
    }

    public function showSuccess()
    {
        // Your stuff here ...

        // Dialog
        $this->dialogSuccess(
            'Operation Successful',
            'Your action was completed successfully.'
        );
    }

    public function showError()
    {
        // Your stuff here ...

        // Dialog
        $this->dialogError(
            'Error Occurred',
            'Something went wrong while processing your request.',
            position: 'top'
        );
    }

    public function showWarning()
    {
        // Your stuff here ...

        // Dialog
        $this->dialogWarning(
            'Warning',
            'This action might have consequences.',
            confirmOptions: ['text' => 'Proceed Anyway']
        );
    }

    public function showInfo()
    {
        // Your stuff here ...

        // Dialog
        $this->dialogInfo(
            'Information',
            'This is important information you should be aware of.'
        );
    }

    public function showConfirm()
    {
        // Your stuff here ...

        // Dialog
        $this->dialogConfirm(
            'Confirm Action',
            'Are you sure you want to proceed with this action?',
            confirmOptions: [
                'text' => 'Yes, proceed',
                'method' => 'confirmed',
                'params' => ['param1', 'param2']
            ],
            cancelOptions: [
                'text' => 'Cancel',
                'method' => 'cancelled'
            ]
        );
    }

    public function showCustom()
    {
        // Your stuff here ...

        // Dialog
        $this->dialog(
            title: 'Custom Dialog',
            description: 'This dialog has custom styling and position.',
            position: 'bottom-right',
            confirmOptions: ['text' => 'Great!'],
            icon: 'o-sparkles',
            css: 'dialog-info',
            backdrop: true,
            blur: true
        );
    }

    #[On('confirmed')]
    public function confirmed($param1, $param2)
    {
        // Handle the confirmation action
        
        // Dialog
        $this->dialogSuccess(
            'Action Confirmed',
            'Your action was confirmed successfully.',
            position: 'center-left'
        );
    }

    #[On('cancelled')]
    public function cancelled()
    {
        // Handle the cancellation action

        // Dialog
        $this->dialogWarning(
            'Action Cancelled',
            'Your action was cancelled.',
            position: 'center-right'
        );
    }
}
?>

<div class="docs">

    <x-anchor title="Dialog" />

    <x-anchor title="Usage" size="text-2xl" class="mt-10 mb-5" />

    <p>
        Place <strong>dialog tag</strong> anywhere on the main layout.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                ...
                <x-dialog />  <!-- [tl! highlight .animate-bounce] -->
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Import the <code>Dialog</code> trait and call one of the dialog methods.
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            use Mary\Traits\Dialog;

            class MyComponent extends Component
            {
                // Use this trait [tl! highlight:1 .animate-bounce]
                use Dialog;

                public function save()
                {
                    // Do your stuff here ...

                    // Dialog
                    $this->dialog(
                        title: 'Dialog Title',
                        description: 'Dialog description text',          // optional (text)
                        position: 'center',                              // optional (position)
                        confirmOptions: ['text' => 'Confirm'],           // optional (array)
                        cancelOptions: ['text' => 'Cancel'],             // optional (array)
                        icon: 'o-information-circle',                    // optional (any icon)
                        css: '',                                         // optional (custom css class)
                        backdrop: true,                                  // optional (show backdrop)
                        blur: false                                      // optional (blur backdrop)
                    );

                    // Shortcuts
                    $this->dialogSuccess(...);
                    $this->dialogError(...);
                    $this->dialogWarning(...);
                    $this->dialogInfo(...);
                    $this->dialogConfirm(...);
                }
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        For convenience this component flashes the following messages to make testing easier.
    </p>

    <x-code no-render language="php">
        session()->flash('mary.dialog.title', $title);
        session()->flash('mary.dialog.description', $description);
    </x-code>

    <x-anchor title="Examples" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The shortcuts are branded with default colors and icons.
    </p>

    <x-code class="grid lg:flex gap-5">
        @verbatim('docs')
            <x-button label="Basic" wire:click="showBasic" />

            <x-button label="Success" class="btn-success" wire:click="showSuccess" />

            <x-button label="Error" class="btn-error" wire:click="showError" />

            <x-button label="Warning" class="btn-warning" wire:click="showWarning" />

            <x-button label="Info" class="btn-info" wire:click="showInfo" />
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            public function showBasic()
            {
                // Your stuff here ...

                // Dialog
                $this->dialog(
                    title: 'Basic Dialog',
                    description: 'This is a basic dialog with default styling.'
                );
            }

            public function showSuccess()
            {
                // Your stuff here ...

                // Dialog
                $this->dialogSuccess(
                    'Operation Successful',
                    'Your action was completed successfully.'
                );
            }

            public function showError()
            {
                // Your stuff here ...

                // Dialog
                $this->dialogError(
                    'Error Occurred',
                    'Something went wrong while processing your request.',
                    position: 'top'
                );
            }

            public function showWarning()
            {
                // Your stuff here ...

                // Dialog
                $this->dialogWarning(
                    'Warning',
                    'This action might have consequences.',
                    confirmOptions: ['text' => 'Proceed Anyway']
                );
            }

            public function showInfo()
            {
                // Your stuff here ...

                // Dialog
                $this->dialogInfo(
                    'Information',
                    'This is important information you should be aware of.'
                );
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Confirmation Dialog" size="text-2xl" class="mt-10 mb-5" />

    <p>
        The confirmation dialog allows you to define actions to be executed when the user confirms or cancels.
    </p>

    <x-code class="grid lg:flex gap-5">
        @verbatim('docs')
            <x-button label="Confirm Action" class="btn-primary" wire:click="showConfirm" />
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            public function showConfirm()
            {
                // Your stuff here ...

                // Dialog
                $this->dialogConfirm(
                    'Confirm Action',
                    'Are you sure you want to proceed with this action?',
                    confirmOptions: [
                        'text' => 'Yes, proceed',
                        'method' => 'confirmed',
                        'params' => ['param1', 'param2']
                    ],
                    cancelOptions: [
                        'text' => 'Cancel',
                        'method' => 'cancelled'
                    ]
                );
            }

            public function confirmed($param1, $param2)
            {
                // Handle the confirmation action
            }

            public function cancelled()
            {
                // Handle the cancellation action
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Positioning" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can position the dialog by passing the <code>position</code> parameter. Available positions are:
    </p>

    <ul class="list-disc list-inside mb-4 ml-4">
        <li><code>top-left</code>, <code>top</code>, <code>top-right</code></li>
        <li><code>center-left</code>, <code>center</code> (default), <code>center-right</code></li>
        <li><code>bottom-left</code>, <code>bottom</code>, <code>bottom-right</code></li>
    </ul>

    <p>
        The default position is <code>center</code>.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                ...
                <x-dialog position="top" />
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Custom Dialog" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can customize the dialog by passing additional parameters.
    </p>

    <x-code class="grid lg:flex gap-5">
        @verbatim('docs')
            <x-button label="Custom Dialog" wire:click="showCustom" />
        @endverbatim
    </x-code>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            public function showCustom()
            {
                // Your stuff here ...

                // Dialog
                $this->dialog(
                    title: 'Custom Dialog',
                    description: 'This dialog has custom styling and position.',
                    position: 'bottom-right',
                    confirmOptions: ['text' => 'Great!'],
                    icon: 'o-sparkles',
                    css: 'dialog-info',
                    backdrop: true,
                    blur: true
                );
            }
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <x-anchor title="Backdrop and Blur" size="text-2xl" class="mt-10 mb-5" />

    <p>
        You can control the backdrop and blur effect by passing the <code>backdrop</code> and <code>blur</code> parameters.
    </p>

    {{--@formatter:off--}}
    <x-code no-render>
        @verbatim('docs')
            <body>
                ...
                <x-dialog :showBackdrop="true" :blurBackdrop="true" />
            </body>
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

    <p>
        Or when calling the dialog method:
    </p>

    {{--@formatter:off--}}
    <x-code no-render language="php">
        @verbatim('docs')
            $this->dialog(
                title: 'Dialog with Blur',
                description: 'This dialog has a blurred backdrop.',
                backdrop: true,
                blur: true
            );
        @endverbatim
    </x-code>
    {{--@formatter:on--}}

</div>
