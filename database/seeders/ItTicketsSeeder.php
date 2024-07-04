<?php

namespace Database\Seeders;

use App\Models\Ittickets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Ittickets::factory()->count(10)->create();
    }
}
