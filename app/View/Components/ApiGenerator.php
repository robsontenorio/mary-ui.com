<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class ApiGenerator extends Component
{
    public string $className;
    public string $title;
    public array  $propsHeader = [
        ['key' => 'prop', 'label' => 'Prop'],
        ['key' => 'description', 'label' => 'Description'],
        ['key' => 'type', 'label' => 'Type'],
        ['key' => 'default', 'label' => 'Default'],
        ['key' => 'required', 'label' => 'Required'],
    ];

    public array $slotsHeader = [
        ['key' => 'slot', 'label' => 'Slot'],
        ['key' => 'description', 'label' => 'Description'],
    ];

    public array $propsData = [];
    public array $slotsData = [];

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function getHeaders(): array
    {
        return [
            'props' => [
                ['key' => 'prop', 'label' => 'Prop'],
                ['key' => 'type', 'label' => 'Type'],
                ['key' => 'default', 'label' => 'Default'],
                ['key' => 'required', 'label' => 'Required'],
            ],
        ];
    }

    public function render()
    {
        $this->generateApi();

        return <<<'blade'
            <x-card title="{{ $title }} API" class="mb-5 border border-base-300" shadow>
                <x-tabs selected="props">
                    <x-tab name="props" label="Props">
                        <x-table :headers="$propsHeader" :rows="$propsData" no-hover>
                            @scope('cell_prop', $prop)
                            <code>{{ $prop['prop'] }}</code>
                            @endscope
                        </x-table>
                    </x-tab>
                    @if(!empty($slotsData))
                    <x-tab name="slots" label="Slots">
                        <x-table :headers="$slotsHeader" :rows="$slotsData">
                            @scope('cell_slot', $slot)
                            <code>{{ $slot['slot'] }}</code>
                            @endscope
                        </x-table>
                    </x-tab>
                    @endif
                </x-tabs>
            </x-card>
            blade;
    }

    public function generateApi(): void
    {
        $reflection  = new \ReflectionClass($this->className);
        $this->title = Str::headline(class_basename($reflection->getName()));
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            throw new \RuntimeException("The constructor for class {$this->className} was not found.");
        }

        $docComment = $constructor->getDocComment();
        $docData    = $this->parseDocBlock($docComment);
        $parameters = $constructor->getParameters();

        foreach ($parameters as $param) {
            $name     = $param->getName();
            $type     = $param->hasType() ? $param->getType()->getName() : 'mixed';
            $default  = $param->isDefaultValueAvailable() ? var_export($param->getDefaultValue(), true) : 'N/A';
            $required = $param->isOptional() ? 'false' : 'true';

            if (array_key_exists($name, $docData['slots'])) {
                $this->slotsData[] = [
                    'slot'        => $name,
                    'description' => $docData['slots'][$name] ?? 'Slot dynamic content',
                ];
            }

            if (array_key_exists($name, $docData['params'])) {
                $this->propsData[] = [
                    'prop'        => $name,
                    'description' => $docData['params'][$name] ?? '',
                    'type'        => $type,
                    'default'     => $default,
                    'required'    => $required,
                ];
            }
        }
    }

    protected function parseDocBlock(?string $docComment): array
    {
        $parsed = ['params' => [], 'slots' => []];

        if (!$docComment) {
            return $parsed;
        }

        $lines = explode("\n", $docComment);
        foreach ($lines as $line) {
            $line = trim($line, " *");

            if (str_starts_with($line, '@param')) {
                preg_match('/@param\s+(\S+)\s+\$(\w+)\s+(.+)/', $line, $matches);
                if ($matches) {
                    $parsed['params'][$matches[2]] = $matches[3];
                }
            }

            if (str_starts_with($line, '@slot')) {
                preg_match('/@slot\s+(\S+)\s+\$(\w+)\s+(.+)/', $line, $matches);
                if ($matches) {
                    $parsed['slots'][$matches[2]] = $matches[3];
                }
            }
        }

        return $parsed;
    }
}
