<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new
#[Title("Carousel")]
#[Layout('layouts.app', ['description' => "Livewire UI carousel component with swipe gestures for mobile."])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Carousel" />

    <x-anchor title="Basic" size="text-xl" class="mt-14" />

    <p>
        It supports swipe gestures on mobile.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php
                $slides = [
                    [
                        'image' => '/images/photos/photo-1494253109108-2e30c049369b.jpg',
                    ],
                    [
                        'image' => '/images/photos/photo-1565098772267-60af42b81ef2.jpg',
                    ],
                    [
                        'image' => '/images/photos/photo-1559703248-dcaaec9fab78.jpg',
                    ],
                    [
                        'image' => '/images/photos/photo-1572635148818-ef6fd45eb394.jpg',
                    ],
                ];
            @endphp

            <x-carousel :slides="$slides" />
        @endverbatim
    </x-code-example>

    <x-anchor title="No indicators" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php                                                                        // [tl! .docs-hide]
                $slides = [                                                             // [tl! .docs-hide]
                    [                                                                    // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1565098772267-60af42b81ef2.jpg',      // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                    [                                                                   // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1559703248-dcaaec9fab78.jpg',         // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                    [                                                                  // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1494253109108-2e30c049369b.jpg',      // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                    [                                                                   // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1572635148818-ef6fd45eb394.jpg',      // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                ];                                                                      // [tl! .docs-hide]
            @endphp                                                                     <!-- [tl! .docs-hide] -->
            <x-carousel :slides="$slides" without-indicators />
        @endverbatim
    </x-code-example>

    <x-anchor title="No arrows" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php                                                                    // [tl! .docs-hide]
                $slides = [                                                         // [tl! .docs-hide]
                   [                                                                // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1572635148818-ef6fd45eb394.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                    [                                                               // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1565098772267-60af42b81ef2.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                     [                                                              // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1494253109108-2e30c049369b.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                    [                                                               // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1559703248-dcaaec9fab78.jpg',     // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                ];                                                                  // [tl! .docs-hide]
            @endphp                                                                 <!-- [tl! .docs-hide] -->
            {{-- Notice you can also override some wrapper CSS classes. --}}
            <x-carousel :slides="$slides" without-arrows class="!h-32 !rounded-none" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Autoplay" size="text-xl" class="mt-14" />

    <x-code-example>
        @verbatim('docs')
            @php                                                                    // [tl! .docs-hide]
                $slides = [                                                         // [tl! .docs-hide]
                   [                                                                // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1572635148818-ef6fd45eb394.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                    [                                                               // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1565098772267-60af42b81ef2.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                     [                                                              // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1494253109108-2e30c049369b.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                    [                                                               // [tl! .docs-hide]
                        'image' => '/images/photos/photo-1559703248-dcaaec9fab78.jpg',     // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                ];                                                                  // [tl! .docs-hide]
            @endphp                                                                 <!-- [tl! .docs-hide] -->
            <x-carousel :slides="$slides" autoplay class="!h-32" />
        @endverbatim
    </x-code-example>

    <p>
        You can change interval by passing the <code>interval</code> attribute.
    </p>

    <x-code-example no-render>
        @verbatim('docs')
            {{--  Default interval is 2000 milliseconds. --}}
            <x-carousel ... autoplay interval="3000" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Full" size="text-xl" class="mt-14" />
    <p>
        Play around removing some attributes. The only required attribute is <code>image</code>.
    </p>

    <x-code-example>
        @verbatim('docs')
            @php
                $slides = [
                    [
                        'image' => '/images/photos/photo-1559703248-dcaaec9fab78.jpg',
                        'title' => 'Frontend developers',
                        'description' => 'We love last week frameworks.',
                        'url' => '/docs/installation',
                        'urlText' => 'Get started',
                    ],
                    [
                        'image' => '/images/photos/photo-1565098772267-60af42b81ef2.jpg',
                        'title' => 'Full stack developers',
                        'description' => 'Where burnout is just a fancy term for Tuesday.',
                    ],
                    [
                        'image' => '/images/photos/photo-1494253109108-2e30c049369b.jpg',
                        'url' => '/docs/installation',
                        'urlText' => 'Let`s go!',
                    ],
                    [
                        'image' => '/images/photos/photo-1572635148818-ef6fd45eb394.jpg',
                        'url' => '/docs/installation',
                    ],
                ];
            @endphp

            <x-carousel :slides="$slides" />
        @endverbatim
    </x-code-example>

    <x-anchor title="Custom slot" size="text-xl" class="mt-14" />
    <p>
        By using the special blade directive <code>&#64;scope</code> you have access to the current item from loop.
        Notice also you have access to the Laravel`s <code>$loop</code> variable.
    </p>

    {{--@formatter:off--}}
    <x-code-example>
        @verbatim('docs')
            @php
                $slides = [
                    [
                        'image' => '/images/photos/photo-1559703248-dcaaec9fab78.jpg',
                        'title' => 'Frontend developers',
                    ],
                    [
                        'image' => '/images/photos/photo-1565098772267-60af42b81ef2.jpg',
                        'title' => 'Full stack developers',
                    ],
                    [
                        'image' => '/images/photos/photo-1494253109108-2e30c049369b.jpg',
                        'title' => 'Hey!',
                    ],
                ];
            @endphp

            <x-carousel :slides="$slides">
                @scope('content', $slide)
                    <div class="mt-16 bg-red-500 font-bold text-white rounded p-2 w-fit mx-auto">
                        {{ $slide['title'] }} - {{  $loop->index }}
                    </div>
                @endscope
            </x-carousel>
        @endverbatim
    </x-code-example>
    {{--@formatter:on--}}

</div>
