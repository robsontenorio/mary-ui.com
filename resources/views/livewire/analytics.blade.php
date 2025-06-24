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
                    ->baseUrl(config('services.umami.api'))
                    ->post("/auth/login", [
                        'username' => config('services.umami.user'),
                        'password' => config('services.umami.password')
                    ])
                    ->json('token');

                $startAt = now()->subDays(30)->getTimestampMs();
                $endAt = now()->getTimestampMs();

                $visitors = Http::retry(3, 100)
                    ->withToken($token)
                    ->baseUrl(config('services.umami.api'))
                    ->get("/websites/" . config('services.umami.site_id') . "/stats?startAt={$startAt}&endAt={$endAt}&unit=day&compare=false")
                    ->json('visitors.value');

                return Number::format($visitors);
            });
        } catch (Throwable $e) {
            return '...';
        }
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="text-center inline-block">
            <span class="loading loading-dots"></span>
        </div>
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
