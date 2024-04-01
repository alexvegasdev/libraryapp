<?php

namespace App\Http\Controllers;

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
            $genre = Genre::create($request->all());
            return response()->json($genre, 201);
      }
}
