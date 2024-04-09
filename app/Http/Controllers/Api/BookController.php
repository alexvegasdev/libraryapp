<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookSearchRequest;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\BookCollection;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Services\BookService;


class BookController extends Controller
{

    public function __construct(private BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(BookSearchRequest $request)
    {
        $genre = $request->input('genre');
        $author = $request->input('author');

        $books = $this->bookService->getBooksByGenreAndAuthor($genre, $author);

        return new BookCollection($books);
    }

    public function store(BookStoreRequest $request)
    {
        $book = $this->bookService->createBookWithGenres($request->except('genre_ids'), $request->genre_ids);
        return new BookResource($book);
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        return new BookResource($book);
    }

        
    public function update(BookUpdateRequest $request, $id)
    {
        $bookData = $request->except('genre_ids');

        try {
            $genreIds = $request->has('genre_ids') ? $request->genre_ids : null;
            $book = $this->bookService->updateBookWithGenres($id, $bookData, $genreIds);

            return new BookResource($book);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(['message' => 'Book eliminado con éxito.'], 200);
    }
}
