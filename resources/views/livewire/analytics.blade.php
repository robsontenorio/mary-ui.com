<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;

new class extends Component {
    public function visitors(): int|string
    {
        try {
            return Cache::remember('mary-statistics', 3600, function () {
                $token = Http::retry(3, 100)
                    ->post("https://api.pirsch.io/api/v1/token", [
                        'client_id' => config('services.pirsch.client_id'),
                        'client_secret' => config('services.pirsch.client_secret')
                    ])
                    ->json('access_token');

                $visitors = Http::retry(3, 100)
                    ->withToken($token)
                    ->get("https://api.pirsch.io/api/v1/statistics/visitor?id=" . config("services.pirsch.dashboard_id"))
                    ->json('0.visitors');

                return Number::format($visitors);
            });
        } catch (Throwable $e) {
            return '...';
        }
    }

    public function placeholder()
    {
        return <<<'HTML'
        <span class="text-center">
            <span class="loading loading-dots"></span>
        </span>
        HTML;
    }

    public function with(): array
    {
        return [
            'visitors' => $this->visitors()
        ];
    }
}; ?>

<div class="inline-block">
    {{ $visitors }}
</div>
