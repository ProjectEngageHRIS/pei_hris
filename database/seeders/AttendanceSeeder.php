<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Dailytimerecord;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $activities = Dailytimerecord::factory()->count(10)->create();


        $employee = Employee::first();
        $today = Carbon::today();
        $usedDates = collect(); // Collection to keep track of used dates
        $employeeId = "SLE0001"; // Starting employee ID
        $recordCount = 275; // Number of records to create
        
        for ($i = 0; $i <= $recordCount; $i++) {
            // Loop to find a unique date not greater than today
            do {
                $randomYear = 2024; // Specify the year
                $randomMonth = rand(1, 12); // Random month (1 to 12)
                $daysInMonth = Carbon::createFromDate($randomYear, $randomMonth, 1)->daysInMonth; // Get the number of days in the month
                $randomDay = rand(1, $daysInMonth); // Random day within the range of days in the month
                $attendanceDate = Carbon::createFromDate($randomYear, $randomMonth, $randomDay);
            } while ($attendanceDate->greaterThan($today) || $usedDates->contains($attendanceDate->format('Y-m-d')));
        
            // Add the date to the set of used dates
            $usedDates->push($attendanceDate->format('Y-m-d'));

            $attendanceId = $employeeId . str_pad($i, 4, '0', STR_PAD_LEFT);
        
            $randomYear1 = rand(2020, 2024);
            $randomMonth1 = rand(1, 12);
            $randomDay1 = rand(1, 28); // to keep it simple, avoiding months with 30 or 31 days
            $randomHour1 = rand(0, 23);
            $randomMinute1 = rand(0, 59);

            // Generate random date, hour, and minute for time_out
            $randomYear2 = rand(2020, 2024);
            $randomMonth2 = rand(1, 12);
            // $randomDay2 = rand(1, 28);
            $randomHour2 = rand(0, 23);
            $randomMinute2 = rand(0, 59);

            // Format date and time into datetime format
            $timeIn = sprintf(
                "%04d-%02d-%02d %02d:%02d:00",
                $randomYear1,
                $randomMonth1,
                $randomDay1,
                $randomHour1,
                $randomMinute1
            );

            $timeOut = sprintf(
                "%04d-%02d-%02d %02d:%02d:00",
                $randomYear1,
                $randomMonth1,
                $randomDay1,
                $randomHour2,
                $randomMinute2
            );
            
             // Randomly assign either 'overtime' or 'undertime' to be 1
            $overtime = rand(0, 1);
            $undertime = $overtime === 1 ? 0 : rand(0, 1);

            Dailytimerecord::create([
                'employee_id' => $employeeId,
                // 'attendance_id' => $attendanceId,
                'type' => 'Completed',
                'attendance_date' => $attendanceDate,
                // 'job_id' => rand(1, 10),
                // 'absent' => rand(1, 2),
                'overtime' => $overtime,
                'undertime' => $undertime,
                // 'cto' => rand(1, 2),
                // 'lwop' => rand(1, 2),
                // 'remarks' => 'remark',
                'time_in' => $timeIn,
                'time_out' => $timeOut,
                'late' => rand(1,0),
                // 'sl_used' => rand(1, 2),
                // 'vl_used' => rand(1, 2),
                'status' => 1,
            ]);
        }
    }
}
