<?php

namespace App\Models;
namespace App\Services;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;


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


}