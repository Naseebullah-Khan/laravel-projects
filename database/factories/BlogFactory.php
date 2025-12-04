<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "image" => "/uploads/image.png",
            "title" => $this->faker->sentence(6),
            "description" => $this->faker->paragraphs(3, true),
            "author_id" => $this->faker->numberBetween(1, 20),
        ];
    }
}
