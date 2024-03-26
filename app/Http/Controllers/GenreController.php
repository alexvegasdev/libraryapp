<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
      public function store(Request $request)
      {
            $genre = Genre::create($request->all());
            return response()->json($genre, 201);
      }
}
