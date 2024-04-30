<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookSearchRequest;
use App\Http\Requests\Book\BookShowRequest;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\BookCollection;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Services\BookService;


class BookController extends Controller
{
    /**
     * BookController constructor.
     * @param BookService $bookService
     */

    public function __construct(private BookService $bookService)
    {
        $this->bookService = $bookService;
        $this->middleware('can:books.store')->only('store');
        $this->middleware('can:books.update')->only('update');
        $this->middleware('can:books.destroy')->only('destroy');
        $this->middleware('can:books.index')->only('index');
        $this->middleware('can:books.show')->only('show');
    }

    /**
     * Display a listing of books with optional filters.
     * 
     * @param BookSearchRequest $request.
     * @return BookCollection Returns a collection of books.
     */
    public function index(BookSearchRequest $request)
    {
        $genre = $request->input('genre');
        $author = $request->input('author');

        $books = $this->bookService->getBooksByGenreAndAuthor($genre, $author);

        return new BookCollection($books);
    }

    /**
     * Store a newly created book.
     * 
     * @param BookStoreRequest $request.
     * @return BookResource Returns the newly created book resource.
     */
    public function store(BookStoreRequest $request)
    {
        $book = $this->bookService->createBookWithGenres($request->except('genre_ids'), $request->genre_ids);
        return new BookResource($book);
    }

    /**
     * Display a specified book .
     * 
     * @param BookShowRequest $request.
    * @return BookResource Returns a resource with book details.
    */
    public function show(Book $book)
    {
        $book = $this->bookService->getBookDetails($book);
        return new BookResource($book);
    }

    /**
     * Update the specified book in the database.
     * 
     * @param BookUpdateRequest $request The request containing update data.
     * @param Book $book The book model to update.
     * @return BookResource Returns a resource with the updated book details.
     */
    public function update(BookUpdateRequest $request, Book $book)
    {
        $bookData = $request->validated();

        if ($request->has('genre_ids')) {
            $genreIds = $request->input('genre_ids');
        } else {
            $genreIds = null;
        }

        $updatedBook = $this->bookService->updateBookWithGenres($book, $bookData, $genreIds);
        return new BookResource($updatedBook);
    }

    /**
     * Remove the specified book from storage.
     * 
     * @param Book $book The book model to delete.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response indicating success.
     */
    public function destroy(Book $book)
    {
        $this->bookService->deleteBookWithGenres($book);
        return response()->json(['success' => 'Deleted book.'], 200);
    }

    /**
     * Get a book by its name using a query param
     * 
     * @param BookShowRequest $request.
     * @return BookResource Returns a resource.
     */
    public function showByTitle(BookShowRequest $request)
    {
        $name = $request->query('name');
        $book = $this->bookService->findByTitle($name);
        return new BookResource($book);
    }
    
}
