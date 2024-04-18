<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{    
    public function __construct()
    {
        $this->middleware('can:authors.store')->only('store');
        $this->middleware('can:authors.update')->only('update');
        $this->middleware('can:authors.destroy')->only('destroy');
        $this->middleware('can:authors.show')->only('update');
        $this->middleware('can:authors.index')->only('destroy');
    }


    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    public function store(Request $request)
    {
        // return Author::firstOrCreate(
        //     ['name' => $request->name],
        //     ['name' => $request->name]
        // );

        $author =  Author::firstOrNew(
            ['name' => $request->name],
            ['name' => $request->name]
        );

        $author->save();
        return $author;
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->update($request->all());
        return response()->json($author);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return response()->json(null, 204);
    }
}
