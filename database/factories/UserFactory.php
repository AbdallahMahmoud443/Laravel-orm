<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'withdraw' => random_int(0, 10000),
            'deposit' => random_int(0, 10000),
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
    /**
     * Indicate that the model's Is_admin should be 1.
     */
    // hint: change of default value of is_admin to 1 when calling AdminAccount() method
    public function AdminAccount(): static
    {
        return $this->state(
            fn(array $attributes) => [
                'is_admin' => 1,
            ]
            // hint : work callback with this state only
        )->afterMaking(function (User $user) {
            Log::info('After making Admin Data');
        })->afterCreating(function (User $user) {
            Log::info('After making Admin Instance');
        });
    }

    /**
     * Configure the model factory. First Way
     */
    // public function configure(): static
    // {
    //     // hint: afterMaking method calling after Create Fake Data
    //     return $this->afterMaking(function (User $user) {
    //         Log::info('After making');
    //         // hint: afterCreating method calling after Create Fake instance
    //     })->afterCreating(function (User $user) {
    //         $user->update(['name' => 'Abdullah']);
    //     });
    // }
}
