<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Author\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{    
    /**
     * AuthorController constructor.
     * 
     */
    public function __construct()
    {
        $this->middleware('can:authors.store')->only('store');
        $this->middleware('can:authors.update')->only('update');
        $this->middleware('can:authors.destroy')->only('destroy');
        $this->middleware('can:authors.show')->only('show');
        $this->middleware('can:authors.index')->only('index');
    }

    /**
     * Get an authors collecction
     *
     * @return AuthorResource Returns a collection of author resources.
     */
    public function index()
    {
        $authors = Author::get();
        return AuthorResource::collection($authors);
    }

    /**
     * Show a specified author.
     *
     * @param Author $author The author instance.
     * @return AuthorResource Returns a resource.
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Stores a newly created author or retrieves an existing one based on the provided name.
     *
     * @param AuthorRequest $request The request containing the author data.
     * @return AuthorResource Returns a resource.
     */
    public function store(AuthorRequest $request)
    {
        $author = Author::firstOrCreate(
            ['name' => $request->name],
            ['name' => $request->name]
        );
        return new AuthorResource($author);
    }

    /**
     * Updates the specified author.
     *
     * @param AuthorRequest $request The request containing the updated data.
     * @param Author $author The author instance to update.
     * @return AuthorResource Returns a resource.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->validated());
        return new AuthorResource($author);
    }

    /**
     * Removes the specified author.
     *
     * @param Author $author The author instance to delete.
     * @return \Illuminate\Http\JsonResponse Returns a JSON response with a success message and a 200 status code.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json(["message" => "Deleted author."], 200);
    }
}