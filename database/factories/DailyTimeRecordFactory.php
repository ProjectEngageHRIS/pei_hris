<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dailytimerecord>
 */
class DailyTimeRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
              // Array of possible employee IDs for demonstration purposes
              $employeeids = [
                'SLE0001',
                'SLE0002',
                'SLE0003',
                'SLE0004',
                'SLE0005',
                'SLE0006',
                'SLE0007',
                'SLE0008',
                'SLE0009',
                'SLE0010',
            ];
    
            // Random start time and end time within a day
            $timeIn = $this->faker->dateTimeBetween('8:00', '10:00');
            $timeOut = $this->faker->dateTimeBetween('14:00', '21:00');
    
            $timeInCarbon = Carbon::parse($timeIn);
            $timeOutCarbon = Carbon::parse($timeOut);
            $differenceInSeconds = $timeInCarbon->diffInSeconds($timeOutCarbon);
            $differenceInMinutes = $timeInCarbon->diffInMinutes($timeOutCarbon);
            $hours = floor($differenceInSeconds / 3600);
            $minutes = floor(($differenceInSeconds % 3600) / 60);
            $seconds = $differenceInSeconds % 60;
    
            $standardWorkMinutes = 540; // 9 hours
    
            if ($hours >= 10) {
                $type = 'Overtime';
                $overtime = $differenceInMinutes - $standardWorkMinutes;
                $undertime = 0;
            } elseif ($hours >= 9) {
                $type = 'Wholeday';
                $overtime = $differenceInMinutes - $standardWorkMinutes;
                $undertime = 0;
            } elseif ($hours >= 5) {
                $type = 'Half-Day';
                $undertime = $standardWorkMinutes - $differenceInMinutes;
                $overtime = 0;
            } else {
                $type = 'Undertime';
                $undertime = $standardWorkMinutes - $differenceInMinutes;
                $overtime = 0;
            }
    
            return [
                // 'employee_id' => $this->faker->randomElement($employeeids),
                'employee_id' => "SLE0001",

                'attendance_date' => $this->faker->unique()->dateTimeBetween('-12 month', 'now'),
                'type' => $type,
                'time_in' => $timeIn,
                'time_out' => $timeOut,
                'late' => $this->faker->boolean,
                'overtime' => $overtime / 60, // Convert minutes to hours
                'undertime' => $undertime / 60, // Convert minutes to hours
                'status' => $this->faker->boolean,
            ];
    }
}
