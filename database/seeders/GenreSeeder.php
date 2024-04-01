<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name' => 'Poesía']);
        Genre::create(['name' => 'Teatro']);
        Genre::create(['name' => 'Cuento']);
        Genre::create(['name' => 'Comedia']);
        Genre::create(['name' => 'Fantasía']);
        Genre::create(['name' => 'Tragedia']);
        Genre::create(['name' => 'Fábula']);
        Genre::create(['name' => 'Histórico']);
    }
}
