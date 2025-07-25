<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'user_id' => fake()->numberBetween(1, 10),
            'likes' => fake()->numberBetween(0, 500),
            'views' => fake()->numberBetween(0, 500),
        ];
    }
}
