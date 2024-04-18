<?php

namespace Database\Seeders;

use App\Enums\GenreEnum;
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
        foreach(GenreEnum::cases() as $genre)
        {
            Genre::create(['name' => $genre]);
        }
    }
}
