<?php

namespace App\Support;

use App\Models\User;
use Blade;
use Illuminate\Support\Collection;

class Spotlight
{
    public function search(mixed $query = ''): Collection
    {
        return collect()
            ->merge($this->actions($query))
            ->merge($this->docs($query))
            ->merge($this->users($query));
    }

    public function actions(mixed $search = ''): Collection
    {
        $icon = Blade::render("<x-mary-icon name='o-bolt' class='w-11 h-11 p-2 bg-yellow-50 rounded-full' />");

        return collect([
            [
                'name' => 'Create user',
                'description' => 'Create a new user',
                'icon' => $icon,
                'link' => '/docs/components/spotlight'
            ],
            [
                'name' => 'Recent orders',
                'description' => 'See recent placed orders',
                'icon' => $icon,
                'link' => '/docs/components/spotlight'
            ]
        ])->filter(function (array $item) use ($search) {
            return str($item['name'] . $item['description'])->lower()->contains($search);
        });
    }

    public function docs(mixed $search = ''): Collection
    {
        $icon = Blade::render("<x-mary-icon name='o-book-open' class='w-11 h-11 p-2 bg-purple-50 rounded-full' />");

        return collect([
            [
                'name' => 'Spotlight',
                'description' => 'Search anything everywhere',
                'icon' => $icon,
                'link' => '/docs/components/spotlight'
            ],
            [
                'name' => 'Table',
                'description' => 'Full featured table with pagination, sort and custom slots',
                'icon' => $icon,
                'link' => '/docs/components/spotlight'
            ],
            [
                'name' => 'Modal',
                'description' => 'Create modals with easy.',
                'icon' => $icon,
                'link' => '/docs/components/spotlight'
            ]
        ])->filter(function (array $item) use ($search) {
            return str($item['name'])->lower()->contains($search) || str($item['description'])->lower()->contains($search);
        });
    }

    public function users(mixed $query = ''): Collection
    {
        return User::query()
            ->with('city')
            ->where('name', 'like', "%$query%")
            ->take(3)
            ->get()
            ->map(function (User $user) {
                return [
                    ...$user->toArray(),
                    'description' => $user->email,
                    'link' => '/docs/components/spotlight'
                ];
            });
    }
}
