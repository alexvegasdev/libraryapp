<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Services\GenreService;
use Illuminate\Http\Request;

class GenreController extends Controller
{     
      protected $genreService;

      public function __construct(GenreService $genreService)
      {
            $this->genreService = $genreService;
            $this->middleware('can:genres.index')->only('index');
            $this->middleware('can:genres.show')->only('show');
            $this->middleware('can:genres.store')->only('store');
            $this->middleware('can:genres.update')->only('update');
            $this->middleware('can:genres.destroy')->only('destroy');
      }

      public function index()
      {
            $genres = $this->genreService->getAllGenres();
            return GenreResource::collection($genres);
      }

      public function show($id)
      {
            $genre = Genre::findOrFail($id);
            return response()->json($genre);
      }

      public function store(Request $request)
      {
            return Genre::whereName($request->name)->firstOr(function () use ($request) {
                  return Genre::create([
                        'name' => $request->name,
                  ]);
            });
      }

      public function update(Request $request, $id)
      {
            $genre = Genre::findOrFail($id);
            $genre->update($request->all());
            return response()->json($genre);
      }

      public function destroy($id)
      {
            $genre = Genre::findOrFail($id);
            $genre->delete();
            return response()->json(["success"=>"Deleted genre"],200);
      }
}
