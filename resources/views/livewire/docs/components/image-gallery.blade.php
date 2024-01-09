<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Image Gallery")]
#[Layout('components.layouts.app', ['description' => 'Livewire ui image gallery component with scroll, swipe and full screen preview.'])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Image Gallery" />

    <p>
        This component is a wrapper around <a href="https://photoswipe.com" target="_blank">PhotoSwipe</a> to easily display a nice image gallery.
        It supports swipe gestures on desktop and mobile devices.
    </p>

    <x-alert icon="o-light-bulb" class="markdown mb-10">
        This a good option to display images from <a href="/docs/components/image-library" wire:navigate>Image Library</a> component.
    </x-alert>

    <x-anchor title="Setup" size="text-2xl" class="mt-10 mb-5" />

    <x-code no-render>
        @verbatim('docs')
            <head>
                ...
                {{-- PhotoSwipe --}}
                <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe.umd.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/umd/photoswipe-lightbox.umd.min.js"></script>
                <link href="https://cdn.jsdelivr.net/npm/photoswipe@5.4.3/dist/photoswipe.min.css" rel="stylesheet">
            </head>
        @endverbatim
    </x-code>

    <x-anchor title="Basic" size="text-2xl" class="mt-10 mb-5" />

    <p>
        By default, the height of previews will be equal the original image heights. Use some CSS to set max height.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $images = [
                    'https://daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.jpg',
                    'https://daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.jpg',
                    'https://daisyui.com/images/stock/photo-1572635148818-ef6fd45eb394.jpg',
                    'https://daisyui.com/images/stock/photo-1494253109108-2e30c049369b.jpg',
                    'https://daisyui.com/images/stock/photo-1550258987-190a2d41a8ba.jpg',
                ]
            @endphp

            <x-image-gallery :images="$images" class="h-40 rounded-box" />
        @endverbatim
    </x-code>
</div>
