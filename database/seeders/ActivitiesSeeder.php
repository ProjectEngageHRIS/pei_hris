<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Training;
use App\Models\Activities;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = Activities::factory()->count(1000)->create();

    }
}
