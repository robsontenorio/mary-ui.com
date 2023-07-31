{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Alert
</x-markdown>

<div class="grid gap-5">
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
</div>

<pre>
<x-torchlight-code language='html'>
    <X-alert title="You have 10 messages" icon="o-exclamation-triangle" />

    <X-alert title="I am using description attribute" description="Received today" icon="o-exclamation-triangle" class="alert-warning" />
    
    <X-alert icon="o-exclamation-triangle" class="alert-success">
        I am using the  <strong>default slot.</strong>
    </X-alert>
    
    <X-alert title="I am using actions slot" description="And the description attribute" icon="o-exclamation-triangle" class="alert-info">
        <X-slot:actions>
            <X-button label="See" />
        </X-slot:actions>
    </X-alert>

    <X-alert title="I have a shadow" icon="o-exclamation-triangle"  shadow />
</x-torchlight-code>
</pre>



</x-layouts.app>
{{-- blade-formatter-enable --}}
