<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => CityFactory::new(),
            'custom_key' => fake()->unique()->randomNumber(),
            'name' => fake()->unique()->firstName(),
            'username' => fake()->unique()->userName(),
            'avatar' => 'https://picsum.photos/200?=' . rand(),
            'email' => fake()->unique()->safeEmail(),
            'other_avatar' => 'https://picsum.photos/200?=' . rand(),
            'other_name' => fake()->unique()->firstName(),
            'other_email' => fake()->unique()->safeEmail(),
            'bio' => fake()->paragraph(),
            'salary' => fake()->randomFloat(2, 1000, 9000),
            'is_employee' => fake()->boolean(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
