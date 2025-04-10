<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new
#[Title("Demos")]
#[Layout('components.layouts.app', ['description' => "Gorgeous demos built with maryUI"])]
class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Demos" />

    <p>
        Deep dive into the source code of these demos and
        <span class="underline decoration-warning font-bold">get amazed</span>
        at how much you can do with <span class="underline decoration-warning font-bold">minimal effort</span> learning by example.
        Each demo contains <span class="underline decoration-warning font-bold">real world code</span> and straight approaches to get the most out of maryUI and Livewire.
    </p>

    <div class="bg-base-content/5 w-fit rounded px-2 py-1 text-xs">
        All demos have been updated to Laravel 12 and maryUI v2!<br>
        If you’ve previously purchased any of them, consider buying again to support the project ❤️.
    </div>

    <div class="grid lg:grid-cols-2 gap-10 lg:gap-x-20 lg:gap-y-8 mt-16">
        {{-- PING --}}
        <div>
            <a href="https://ping.mary-ui.com" target="_blank">
                <div class="mockup-browser  bg-base-300 cursor-pointer hover:scale-105 transition-all shadow-xl">
                    <div class="mockup-browser-toolbar"></div>
                    <div>
                        <img src="/ping-demo.png?u=2025-04-09" />
                    </div>
                </div>
            </a>
            <div class="mt-5">
                <x-header title="Ping" subtitle="The real time chat demo." size="text-xl" />
            </div>
        </div>

        {{-- FLOW --}}
        <div>
            <a href="https://flow.mary-ui.com" target="_blank">
                <div class="mockup-browser  bg-base-300 cursor-pointer hover:scale-105 transition-all shadow-xl">
                    <div class="mockup-browser-toolbar"></div>
                    <div>
                        <img src="/flow-demo.png?u=2025-04-09" />
                    </div>
                </div>
            </a>
            <div class="mt-5">
                <x-header title="Flow" subtitle="The dashboard demo." size="text-xl" />
            </div>
        </div>

        {{-- ORANGE --}}
        <div>
            <a href="https://orange.mary-ui.com" target="_blank">
                <div class="mockup-browser  bg-base-300 cursor-pointer hover:scale-105 transition-all shadow-xl">
                    <div class="mockup-browser-toolbar"></div>
                    <div>
                        <img src="/orange-demo.png?u=2025-04-09" />
                    </div>
                </div>
            </a>
            <div class="mt-5">
                <x-header title="Orange" subtitle="The refreshing storefront demo" size="text-xl" />
            </div>
        </div>

        {{-- PAPER --}}
        <div>
            <a href="https://paper.mary-ui.com" target="_blank">
                <div class="mockup-browser  bg-base-300 cursor-pointer hover:scale-105 transition-all shadow-xl">
                    <div class="mockup-browser-toolbar"></div>
                    <div>
                        <img src="/paper-demo.png?u=2025-04-09" />
                    </div>
                </div>
            </a>
            <div class="mt-5">
                <x-header title="Paper" subtitle="The elegant and minimalist demo" size="text-xl" />
            </div>
        </div>
    </div>

</div>
