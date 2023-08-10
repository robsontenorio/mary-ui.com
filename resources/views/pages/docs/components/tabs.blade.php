{{-- blade-formatter-disable --}}
<x-layouts.app>

<x-markdown>
# Tabs
</x-markdown>

<x-code>
    @verbatim
    <x-tabs selected="tab2">
        <x-tab name="tab1" label="Users" icon="o-users">
            <span>Users</span>
        </x-tab>
        <x-tab name="tab2" label="Offices" icon="o-building-office">
            <span>Offices</span>
        </x-tab>
        <x-tab name="tab3" label="Musics" icon="o-musical-note">
            <span>Musics</span>
        </x-tab>
    </x-tabs>
    @endverbatim
</x-code>

</x-layouts.app>
{{-- blade-formatter-enable --}}
