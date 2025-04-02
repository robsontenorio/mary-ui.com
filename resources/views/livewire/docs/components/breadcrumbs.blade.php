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
    <x-anchor title="Default" size="text-xl" class="mt-14" />

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

    <x-anchor title="Custom seperator, icons & links" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
        @verbatim('docs')
            @php
                $breadcrumbs = [
                    [
                        'label' => 'Home',
                        'link' => '#default',
                        'icon' => 'o-home',
                    ],
                    [
                        'label' => 'Documents',
                        'link' => '#custom-seperator-icons-links',
                        'icon' => 'o-document-text',
                    ],
                    [
                        'label' => 'Add document',
                        'link' => '#tooltip-customization',
                        'icon' => 'o-plus-circle',
                    ],
                ];
            @endphp
            <x-breadcrumbs :items="$breadcrumbs" seperator="o-chevron-right" />
        @endverbatim
    </x-code>

    <x-anchor title="Tooltip & customization" size="text-xl" class="mt-14" />

    <x-code class="flex gap-5">
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
            <x-breadcrumbs :items="$breadcrumbs" seperator="m-minus" 
                seperatorClass="h-8 w-8 rotate-90 -mx-2 text-secondary" 
                class="bg-base-300 p-3 rounded-box shadow-md" 
                iconClass="text-warning" 
                linkItemClass="btn btn-primary btn-sm" 
                textItemClass="btn btn-primary btn-outline btn-sm pointer-events-none" />
        @endverbatim
    </x-code>
</div>
