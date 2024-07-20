<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Author::factory(15)->create();

        $authors = [
            ['name' => 'William Shakespeare'],
            ['name' => 'Jane Austen'],
            ['name' => 'Fyodor Dostoevsky'],
            ['name' => 'Emily Dickinson'],
            ['name' => 'Mark Twain'],
            ['name' => 'Leo Tolstoy'],
            ['name' => 'Charles Dickens'],
            ['name' => 'Gabriel García Márquez'],
            ['name' => 'George Orwell'],
            ['name' => 'Ernest Hemingway'],
            ['name' => 'Virginia Woolf'],
            ['name' => 'Homer'],
            ['name' => 'J.K. Rowling'],
            ['name' => 'Miguel de Cervantes'],
            ['name' => 'Edgar Allan Poe'],
            ['name' => 'T.S. Eliot'],
            ['name' => 'Oscar Wilde'],
            ['name' => 'Victor Hugo'],
            ['name' => 'Agatha Christie'],
            ['name' => 'Hermann Hesse'],
            ['name' => 'Franz Kafka'],
            ['name' => 'Harper Lee'],
            ['name' => 'James Joyce'],
            ['name' => 'J.R.R. Tolkien'],
            ['name' => 'Albert Camus'],
            ['name' => 'Stephen King'],
            ['name' => 'H.G. Wells'],
            ['name' => 'F. Scott Fitzgerald'],
            ['name' => 'Anton Chekhov'],
            ['name' => 'Margaret Atwood'],
            ['name' => 'George R.R. Martin'],
            ['name' => 'John Steinbeck'],
            ['name' => 'Arthur Conan Doyle'],
            ['name' => 'Roald Dahl'],
            ['name' => 'Philip K. Dick'],
            ['name' => 'Charles Bukowski'],
            ['name' => 'Jack London'],
            ['name' => 'Ralph Waldo Emerson'],
            ['name' => 'Dante Alighieri']
        ];

        foreach ($authors as $author){
            Author::create([
                'name' => $author['name']
            ]);
        }
    }
}
