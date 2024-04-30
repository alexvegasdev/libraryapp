<?php

namespace Database\Seeders;

use App\Enums\LoanStatusEnum;
use App\Models\LoanStatus;
use Illuminate\Database\Seeder;

class LoanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(LoanStatusEnum::cases() as $status)
        {
            LoanStatus::create(['name' => $status]);
        }
    }
}
