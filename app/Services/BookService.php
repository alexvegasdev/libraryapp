<?php

namespace App\Models;
namespace App\Services;

use App\Models\Book;
use App\Models\Genre;

class BookService
{
      public function getBooksByGenreAndAuthor($genre, $author)
      {
            $query = Book::with('genres', 'author');
      
            if ($genre) {
                  $query->whereHas('genres', function ($subquery) use ($genre) {
                        $subquery->where('name', $genre);
                  });
            }
      
            if ($author) {
                  $query->whereHas('author', function ($subquery) use ($author) {
                        $subquery->where('name', $author);
                  });
            }
      
            return $query->get();
      }

      public function getBookById($id)
      {
            return Book::with(['genres','author'])->findOrFail($id);
      }

      public function createBookWithGenres($bookData, $genreIds)
      {
            $book = Book::create($bookData);
            $book->genres()->sync($genreIds);
            return $book;

      }

      public function updateBookWithGenres($id, $bookData, $genreIds = null)
      {
            $book = Book::findOrFail($id);
            $book->update($bookData);

            if (!is_null($genreIds)) {
                  $book->genres()->sync($genreIds);
            }

            return $book->load(['genres', 'author']);
      }
}