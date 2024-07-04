<?php

namespace Database\Seeders;

use App\Models\Hrticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HrTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Hrticket::factory()->count(10)->create();
        
    }
}
