<?php
namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;


use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $genre = $request->input('genre');
        $author = $request->input('author');

        $query = Book::query();

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

        $books = $query->with(['genres' => function ($query) {
            $query->select('genres.id', 'genres.name');
        }])
        ->addSelect(['id', 'name', 'description', 'edition_year'])
        ->addSelect(['author' => Author::select('name')
            ->whereColumn('authors.id', 'books.author_id')])
        ->get();
        
        $books->each(function ($book) {
            $book->setRelation('genres', $book->genres->pluck('name'));
        });

        return response()->json($books);
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
