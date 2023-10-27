<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new #[Title('Customizing')] class extends Component {
    //
}; ?>

<div class="docs">
    <x-anchor title="Customizing" />

    <p>
        Mary <strong>does not ship</strong> any config files. All settings are provided through <strong>daisyUI</strong> and <strong>Tailwind</strong>.
        Here are some usefull links:
    </p>
    <ul>
        <li><a href="https://daisyui.com/docs/customize" target="_blank">Customize</a></li>
        <li><a href="https://daisyui.com/docs/config" target="_blank">Config</a></li>
        <li><a href="https://daisyui.com/docs/colors" target="_blank">Colors</a></li>
        <li><a href="https://daisyui.com/docs/themes" target="_blank">Themes</a></li>
    </ul>

</div>
