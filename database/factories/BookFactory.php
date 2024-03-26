<?php

namespace Database\Factories;
use App\Models\Author;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'description'=>fake()->text(),
            'edition_year'=>fake()->year(),
            'author_id' =>Author::factory()
        ];
    }
}
