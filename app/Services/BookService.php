<?php
declare(strict_types=1);
namespace App\Models;
namespace App\Services;
use App\Models\Book;

class BookService
{
      public function getBooksByGenreAndAuthor(string $genre=null, string $author=null)
      {
            $book = Book::with('genres', 'author');
      
            if ($genre) {
                  $book->whereHas('genres', function ($query) use ($genre) {
                        $query->where('name', $genre);
                  });
            }
      
            if ($author) {
                  $book->whereHas('author', function ($query) use ($author) {
                        $query->where('name', $author);
                  });
            }
      
            return $book->get();
      }

      public function getBookDetails(Book $book)
      {
            $book->load(['genres', 'author']);
            return $book;
      }

      public function createBookWithGenres(array $bookData, array $genreIds) 
      {
            $book = Book::create($bookData);
            $book->genres()->sync($genreIds);
            return $book;
      }

      public function updateBookWithGenres(Book $book, array $bookData, array $genreIds=null)
      {
            $book->update($bookData);
            $book->genres()->sync($genreIds);

            return $book->load(['genres', 'author']);
      }
}