<?php

use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

new class extends Component {
    public function fetchReleases()
    {
        try {
            return Cache::remember('mary-releases', 3600, function () {
                return Http::withToken(config('services.github.token'), type: 'token')
                    ->get("https://api.github.com/repos/robsontenorio/mary/releases")
                    ->throw()
                    ->collect()
                    ->take(5);
            });
        } catch (Exception $e) {
            return [];
        }
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <div class="loading loading-spinner"></div>
        </div>
        HTML;
    }

    public function with(): array
    {
        return [
            'releases' => $this->fetchReleases()
        ];
    }
} ?>

<div>
    @forelse($releases as $release)
        <x-list-item :item="$release" sub-value="created_at">
            <x-slot:actions>
                @if(Str::contains($release['body'], 'Breaking'))
                    <x-badge class="badge-error" value="breaking change" />
                @endif

                <x-button icon="o-arrow-up-right" :link="$release['html_url']" external class="btn-sm" />
            </x-slot:actions>
        </x-list-item>
    @empty
        <x-alert icon="o-exclamation-triangle" title="Failed to fetch" class="alert-error alert-outline" />
    @endforelse
</div>
