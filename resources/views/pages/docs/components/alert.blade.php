{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Alert
</x-markdown>

<x-code class="grid gap-5 bg-white px-0 py-0 shadow-none">
@verbatim
    <x-alert title="You have 10 messages" icon="o-exclamation-triangle" />

    <x-alert title="I am using description attribute" description="Received today" icon="o-exclamation-triangle" class="alert-warning" />
    
    <x-alert icon="o-exclamation-triangle" class="alert-success">
        I am using the  <strong>default slot.</strong>
    </x-alert>
    
    <x-alert title="I am using actions slot" description="And the description attribute" icon="o-exclamation-triangle" class="alert-info">
        <x-slot:actions>
            <x-button label="See" />
        </x-slot:actions>
    </x-alert>

    <x-alert title="I have a shadow" icon="o-exclamation-triangle"  shadow />
@endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
