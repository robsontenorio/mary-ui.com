<?php

use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

new class extends Component {
    public function fetchSponsors()
    {
        try {
            return Cache::remember('mary-sponsors', 3600, function () {
                $sponsors = Http::withToken(config('services.github.token'))
                    ->post('https://api.github.com/graphql', [
                        'query' => '
                        {
                          user(login: "robsontenorio") {
                            sponsors(first: 100) {
                              nodes {
                                ... on User {
                                  login
                                  avatarUrl
                                  url
                                }
                              }
                            }
                          }
                        }'
                    ])->json();

                return collect($sponsors['data']['user']['sponsors']['nodes'])->filter();
            });
        } catch (Throwable $e) {
            return [];
        }
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="text-center">
            <div class="loading loading-dots"></div>
        </div>
        HTML;
    }

    public function with(): array
    {
        return [
            'sponsors' => $this->fetchSponsors()
        ];
    }
}; ?>

<div>
    <div class="flex flex-wrap gap-3 justify-center">
        @foreach($sponsors as $sponsor)
            <a href="{{ $sponsor['url'] ?? '/' }}" data-tip="{{ $sponsor["login"] ?? '' }}" target="_blank" class="tooltip">
                <img src="{{ $sponsor['avatarUrl'] ?? '/empty-user.jpg' }}" width="48" class="rounded-full" />
            </a>
        @endforeach
    </div>
    <div class="text-xs text-base-content/40 text-center mt-5">
        Private sponsors are not listed here.
    </div>
</div>
