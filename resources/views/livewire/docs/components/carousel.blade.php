<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Carousel")]
#[Layout('components.layouts.app', ['description' => "Livewire UI carousel component with swipe gestures for mobile."])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Carousel" />

    <x-anchor title="Basic" size="text-2xl" class="mt-10 mb-5" />

    <p>
        It supports swipe gestures on mobile.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $slides = [
                    [
                        'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',
                    ],
                    [
                        'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',
                    ],
                    [
                        'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',
                    ],
                    [
                        'image' => '/photos/photo-1572635148818-ef6fd45eb394.jpg',
                    ],
                ];
            @endphp

            <x-carousel :slides="$slides" />
        @endverbatim
    </x-code>

    <x-anchor title="No indicators" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            @php                                                                        // [tl! .docs-hide]
                $slides = [                                                             // [tl! .docs-hide]
                    [                                                                    // [tl! .docs-hide]
                        'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',      // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                    [                                                                   // [tl! .docs-hide]
                        'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',         // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                    [                                                                  // [tl! .docs-hide]
                        'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',      // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                    [                                                                   // [tl! .docs-hide]
                        'image' => '/photos/photo-1572635148818-ef6fd45eb394.jpg',      // [tl! .docs-hide]
                    ],                                                                  // [tl! .docs-hide]
                ];                                                                      // [tl! .docs-hide]
            @endphp                                                                     <!-- [tl! .docs-hide] -->
            <x-carousel :slides="$slides" without-indicators />
        @endverbatim
    </x-code>

    <x-anchor title="No arrows" size="text-2xl" class="mt-10 mb-5" />

    <x-code>
        @verbatim('docs')
            @php                                                                    // [tl! .docs-hide]
                $slides = [                                                         // [tl! .docs-hide]
                   [                                                                // [tl! .docs-hide]
                        'image' => '/photos/photo-1572635148818-ef6fd45eb394.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                    [                                                               // [tl! .docs-hide]
                        'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                     [                                                              // [tl! .docs-hide]
                        'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',  // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                    [                                                               // [tl! .docs-hide]
                        'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',     // [tl! .docs-hide]
                    ],                                                              // [tl! .docs-hide]
                ];                                                                  // [tl! .docs-hide]
            @endphp                                                                 <!-- [tl! .docs-hide] -->
            {{-- Notice you can also override some wrapper CSS classes. --}}
            <x-carousel :slides="$slides" without-arrows class="!h-32 !rounded-none" />
        @endverbatim
    </x-code>

    <x-anchor title="Full" size="text-2xl" class="mt-10 mb-5" />
    <p>
        Play around removing some attributes. The only required attribute is <code>image</code>.
    </p>

    <x-code>
        @verbatim('docs')
            @php
                $slides = [
                    [
                        'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',
                        'title' => 'Front end developers',
                        'description' => 'We love last week frameworks.',
                        'url' => '/docs/installation',
                        'urlText' => 'Get started',
                    ],
                    [
                        'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',
                        'title' => 'Full stack developers',
                        'description' => 'Where burnout is just a fancy term for Tuesday.',
                    ],
                    [
                        'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',
                        'url' => '/docs/installation',
                        'urlText' => 'Let`s go!',
                    ],
                    [
                        'image' => '/photos/photo-1572635148818-ef6fd45eb394.jpg',
                        'url' => '/docs/installation',
                    ],
                ];
            @endphp

            <x-carousel :slides="$slides" />
        @endverbatim
    </x-code>

    <x-anchor title="Custom slot" size="text-2xl" class="mt-10 mb-5" />
    <p>
        By using the special blade directive <code>&#64;scope</code> you have access to the current item from loop.
        Notice also you have access to the Laravel`s <code>$loop</code> variable.
    </p>

    {{--@formatter:off--}}
    <x-code>
        @verbatim('docs')
            @php
                $slides = [
                    [
                        'image' => '/photos/photo-1559703248-dcaaec9fab78.jpg',
                        'title' => 'Front end developers',
                    ],
                    [
                        'image' => '/photos/photo-1565098772267-60af42b81ef2.jpg',
                        'title' => 'Full stack developers',
                    ],
                    [
                        'image' => '/photos/photo-1494253109108-2e30c049369b.jpg',
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
    </x-code>
    {{--@formatter:on--}}

</div>
