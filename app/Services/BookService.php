<?php
declare(strict_types=1);

namespace App\Services;
use App\Models\Book;

class BookService
{
      /**
       * Get books by genre or/and author. Both parameters are optional.
       * 
       * @param string $genre Book's genre. 
       * @param string $author Book's author. 
       *  @return \Illuminate\Database\Eloquent\Collection Returns a collection of Book models.
       */

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

      /**
       * Get a book's details.
       * 
       * @param Book $book The book model instance.
       * @return Book Returns the book model loaded with related genres and author.
       */

      public function getBookDetails(Book $book)
      {
            return $book->load(['genres', 'author']);
            
      }

      /**
       * Create a new book with its genres.
       * 
       * @param array $bookData Book's data : name, description, edition year and its author.
       * @param array $genreIds Associated genres with the book.
       * @return Book Returns the newly created book model with genre relations established.
       */

      public function createBookWithGenres(array $bookData, array $genreIds) 
      {
            // $book = Book::create($bookData);
            // $book->genres()->sync($genreIds);
            // return $book;

            $book = Book::withTrashed()
            ->where('title', $bookData['title'])
            ->first();

            if ($book && $book->trashed()) {
                  $book->restore();
                  $book->update($bookData);
            } else if (!$book) {
                  $book = Book::create($bookData);
            } else {
                  $book->update($bookData);
            }

            $book->genres()->sync($genreIds);

            return $book;
      }

      /**
       * Update a book's details and optionally its genres.
      * 
      * @param Book $book The book model instance.
      * @param array $bookData Updated details of the book such as name, description, edition year, and its author.
      * @param array|null $genreIds Optional array of genre IDs.
      * @return Book Returns the updated book model loaded with current genres and author.
       */

      public function updateBookWithGenres(Book $book, array $bookData, array $genreIds=null)
      {
            $book->update($bookData);
            if ($genreIds !== null) {
                  $book->genres()->sync($genreIds);
            }

            return $book->load(['genres', 'author']);
      }

      /**
       * Delete a book and detach its associated genres.
       * 
       * @param Book $book The book model to delete.
       * 
       */

      public function deleteBookWithGenres(Book $book)
      {
            $book->genres()->detach();
            $book->delete();
      }

      /**
       * Find a book by name.
       *
       * @param string $title
       * @return Book
       * @throws Illuminate\Database\Eloquent\ModelNotFoundException Thrown if no book is found with the specified name.
       */
      public function findByTitle(string $title)
      {
            return Book::where('title', $title )->firstOrFail();
      }

      /**
       * 
       * Get Books by Date
       * @param string $date
       * 
       */

      public function getBooksByDate(string $date)
      {
            try {
                  $date = new \DateTime($date);
            } catch (\Exception $e) {
                  return response()->json(['error' => 'Formato de fecha inválido.'], 400);
            }

            return Book::where('created_at', '>=', $date->format('Y-m-d'))->get();

      }
}
