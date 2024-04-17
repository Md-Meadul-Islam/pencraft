<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    protected static ?string $password;
    public function definition(): array
    {
        return [
            'user_id' => Str::random(30),
            'name' => fake()->name(30),
            'nickname' => fake()->unique()->lastName(15),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'avater' => fake()->image('public/stor/avater', 60, 60, null, false),
            'country' => fake()->countryCode(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
