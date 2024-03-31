<?php
namespace App\Services;

use App\Models\Genre;

class GenreService
{
      public function getAllGenres()
      {
            return Genre::all();
      }
}