<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title('Breadcrumbs')]
#[Layout('components.layouts.app', ['description' => 'Livewire UI breadcrumbs component.'])]
class extends Component {
}
?>
<div class="docs">

    <x-anchor title="Breadcrumbs" />

    <p>
        This component uses <code>ul</code> and <code>li</code> HTML tags. Make sure you have an extra rule to not override them on your custom CSS.
    </p>

    <x-anchor title="Default" size="text-xl" class="mt-14" />

    <p>
        On small screens, it automatically hides all intermediate items.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $breadcrumbs = [
                    ['label' => 'Home'],
                    ['label' => 'Documents'],
                    ['label' => 'Add document'],
                ];
            @endphp

            <x-breadcrumbs :items="$breadcrumbs" />
        @endverbatim
    </x-code>

    <x-anchor title="Custom separator, icons & links" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            @php
                $breadcrumbs = [
                    [
                        'link' => '#default',
                        'icon' => 's-home',
                    ],
                    [
                        'label' => 'Documents',
                        'link' => '/docs/components/breadcrumbs',
                        'icon' => 'o-document',
                    ],
                    [
                        'label' => 'Add document',
                        'icon' => 'o-plus',
                    ],
                ];
            @endphp

            <x-breadcrumbs :items="$breadcrumbs" separator="o-slash" />

        @endverbatim
    </x-code>

    <x-anchor title="Tooltip & customization" size="text-xl" class="mt-14" />

    <x-code>
        @verbatim('docs')
            @php
                $breadcrumbs = [
                    [
                        'label' => 'Home',
                        'icon' => 'm-home',
                        'tooltip-left' => 'Tooltips are supported!',
                    ],
                    [
                        'label' => 'Documents',
                        'link' => '/docs/components/breadcrumbs',
                        'tooltip' => 'Default position is top!',
                    ],
                    [
                        'label' => 'Edit document',
                        'tooltip-bottom' => 'Positions are changable!',
                    ],
                    [
                        'label' => '# 42',
                        'tooltip-right' => 'And one from the right',
                    ],
                ];
            @endphp

            <x-breadcrumbs
                :items="$breadcrumbs"
                separator="m-minus"
                separator-class="text-warning"
                class="bg-base-300 p-3 rounded-box"
                icon-class="text-warning"
                link-item-class="text-sm font-bold"
            />
        @endverbatim
    </x-code>
</div>
