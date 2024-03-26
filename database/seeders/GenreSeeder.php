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
        DB::table('genres')->insert([
            ['name' => 'Poesía'],
            ['name' => 'Teatro'],
            ['name' => 'Cuento'],
            ['name' => 'Comedia'],
            ['name' => 'Fantasia'],
            ['name' => 'Tragedia'],
            ['name' => 'Fábula'],
            ['name' => 'Historico'],
        ]);
    }
}
