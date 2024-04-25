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
        $this->middleware('can:books.store')->only('store');
        $this->middleware('can:books.update')->only('update');
        $this->middleware('can:books.destroy')->only('destroy');
        $this->middleware('can:books.index')->only('index');
        $this->middleware('can:books.show')->only('show');
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

    public function show(Book $book)
    {
        $book = $this->bookService->getBookDetails($book);
        return new BookResource($book);
    }

        
    public function update(BookUpdateRequest $request, Book $book)
    {
        $bookData = $request->validated();
        $genreIds = $request->has('genre_ids') ? $request->genre_ids : null;
        $updatedBook = $this->bookService->updateBookWithGenres($book, $bookData, $genreIds);

        return new BookResource($updatedBook);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(['message' => 'Deleted book.'], 200);
    }
}
