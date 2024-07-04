<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Leaverequest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeaveRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee_id = "SLE0001";

        $employees = Leaverequest::factory()->count(10)->create();


    //    for($i = 0; $i >= 10; $i++){
    //         Leaverequest::make([
    //             'employee_id' => $employee_id ,
    //             'status' => 'reviewing',
    //             'supervisor_email' => 'test@projectengage.com',
    //             'application_date' => Carbon::now(),
    //             'mode_of_application' => 'online',
    //             'inclusive_start_date' => Carbon::now()->subDays(10),
    //             'inclusive_end_date' => Carbon::now()->subDays(5),
    //             'deduct_to' => 'annual_leave',
    //             'num_of_days_work_days_applied' => 5,
    //             'date_earned' => Carbon::now()->subMonth(),
    //             'earned_description' => 'Yearly Bonus',
    //             'purpose_type' => 'Vacation',
    //             'reason' => 'Family vacation',
    //             'cancelled_at' => null,
    //         ]);
    //    }
    }
}
