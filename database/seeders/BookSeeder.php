<?php

namespace Database\Seeders;

use App\Enums\GenreEnum;
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
        // Book::factory(20)->create()->each(function ($book) {
        //     $genres = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
        //     $book->genres()->attach($genres);
        // });

        $books = [
            // William Shakespeare
            [
                'title' => 'Romeo and Juliet',
                'description' => 'A tragedy about two young star-crossed lovers whose deaths ultimately reconcile their feuding families.',
                'edition_year' => 1597,
                'author_id' => 1,
                'genres' => [GenreEnum::TRAGEDY, GenreEnum::ROMANCE]
            ],
            [
                'title' => 'Hamlet',
                'description' => 'A tragedy about Prince Hamlet of Denmark, who seeks revenge against his uncle, who has murdered Hamlet\'s father and married his mother.',
                'edition_year' => 1603,
                'author_id' => 1,
                'genres' => [GenreEnum::TRAGEDY, GenreEnum::DRAMA]
            ],
            [
                'title' => 'Macbeth',
                'description' => 'A tragedy about a Scottish general named Macbeth who is told by three witches that he will become king of Scotland.',
                'edition_year' => 1623,
                'author_id' => 1,
                'genres' => [GenreEnum::TRAGEDY, GenreEnum::HISTORICAL]
            ],
            [
                'title' => 'King Lear',
                'description' => 'A tragedy that depicts the gradual descent into madness of the title character, after he disposes of his kingdom by giving bequests to two of his three daughters egged on by their continual flattery, bringing tragic consequences for all.',
                'edition_year' => 1608,
                'author_id' => 1,
                'genres' => [GenreEnum::TRAGEDY]
            ],
            [
                'title' => 'Othello',
                'description' => 'A tragedy about a Moorish general in the Venetian army, whose life and marriage are ruined by his scheming ensign Iago.',
                'edition_year' => 1622,
                'author_id' => 1,
                'genres' => [GenreEnum::TRAGEDY, GenreEnum::DRAMA]
            ],
        ];

        foreach ($books as $bookData) {
            $book = Book::create([
                'title' => $bookData['title'],
                'description' => $bookData['description'],
                'edition_year' => $bookData['edition_year'],
                'author_id' => $bookData['author_id'],
            ]);
        
            foreach ($bookData['genres'] as $genreName) {
                $genre = Genre::firstOrCreate(['name' => $genreName]);
                $book->genres()->attach($genre);
            }
        }
    }
}
