<?php

namespace Database\Seeders;

use App\Models\Mytasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MyTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Mytasks::factory()->count(10)->create();

    }
}
