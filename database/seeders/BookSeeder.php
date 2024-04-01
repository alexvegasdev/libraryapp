<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(20)->create()->each(function ($book) {
            $genres = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $book->genres()->attach($genres);
        });
    }
}
