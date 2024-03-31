<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Services\BookService;


use Illuminate\Http\Request;

class BookController extends Controller
{

    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(Request $request)
    {
        $genre = $request->input('genre');
        $author = $request->input('author');

        $books = $this->bookService->getBooksByGenreAndAuthor($genre, $author);

        return BookResource::collection($books);
    }

    public function store(Request $request)
    {

        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
