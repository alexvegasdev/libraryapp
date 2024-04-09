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
        $genres = [
            ['name' => 'Poesía'],
            ['name' => 'Teatro'],
            ['name' => 'Cuento'],
            ['name' => 'Comedia'],
            ['name' => 'Fantasía'],
            ['name' => 'Tragedia'],
            ['name' => 'Fábula'],
            ['name' => 'Histórico']

        ];

        foreach($genres as $genre){
            Genre::create([
                'name' =>$genre['name'],
            ]);
        }
    }
}
