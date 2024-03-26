<?php

namespace Database\Seeders;

use App\Models\CopyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CopyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CopyStatus::create(['name' => 'Disponible']);
        CopyStatus::create(['name' => 'Reservado']);
    }
}
