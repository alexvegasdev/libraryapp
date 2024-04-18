<?php

namespace Database\Seeders;

use App\Enums\CopyStatusEnum;
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
        foreach(CopyStatusEnum::cases() as $status)
        {
            CopyStatus::create(['name' => $status]);
        }
    }
}
