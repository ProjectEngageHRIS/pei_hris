<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Dailytimerecord;
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
    // public function definition(): array
    // {
    //           // Array of possible employee IDs for demonstration purposes
    //           $employeeids = [
    //             'SLE0001',
    //             'SLE0002',
    //             'SLE0003',
    //             'SLE0004',
    //             'SLE0005',
    //             'SLE0006',
    //             'SLE0007',
    //             'SLE0008',
    //             'SLE0009',
    //             'SLE0010',
    //         ];
    
    //         // Random start time and end time within a day
    //         $timeIn = $this->faker->dateTimeBetween('8:00', '10:00');
    //         $timeOut = $this->faker->dateTimeBetween('14:00', '21:00');
    
    //         $timeInCarbon = Carbon::parse($timeIn);
    //         $timeOutCarbon = Carbon::parse($timeOut);
    //         $differenceInSeconds = $timeInCarbon->diffInSeconds($timeOutCarbon);
    //         $differenceInMinutes = $timeInCarbon->diffInMinutes($timeOutCarbon);
    //         $hours = floor($differenceInSeconds / 3600);
    //         $minutes = floor(($differenceInSeconds % 3600) / 60);
    //         $seconds = $differenceInSeconds % 60;
    
    //         $standardWorkMinutes = 540; // 9 hours
    
    //         if ($hours >= 10) {
    //             $type = 'Overtime';
    //             $overtime = $differenceInMinutes - $standardWorkMinutes;
    //             $undertime = 0;
    //         } elseif ($hours >= 9) {
    //             $type = 'Wholeday';
    //             $overtime = $differenceInMinutes - $standardWorkMinutes;
    //             $undertime = 0;
    //         } elseif ($hours >= 5) {
    //             $type = 'Half-Day';
    //             $undertime = $standardWorkMinutes - $differenceInMinutes;
    //             $overtime = 0;
    //         } else {
    //             $type = 'Undertime';
    //             $undertime = $standardWorkMinutes - $differenceInMinutes;
    //             $overtime = 0;
    //         }
    
    //         return [
    //             // 'employee_id' => $this->faker->randomElement($employeeids),
    //             'employee_id' => "SLE0001",

    //             'attendance_date' => $this->faker->unique()->dateTimeBetween('-12 month', 'now'),
    //             'type' => $type,
    //             'time_in' => $timeIn,
    //             'time_out' => $timeOut,
    //             'late' => $this->faker->boolean,
    //             'overtime' => $overtime / 60, // Convert minutes to hours
    //             'undertime' => $undertime / 60, // Convert minutes to hours
    //             'status' => $this->faker->boolean,
    //         ];
    // }

    // public function definition()
    // {
    //     return [
    //         'employee_id' => 'SLE' . str_pad($this->faker->numberBetween(1, 10), 4, '0', STR_PAD_LEFT),
    //         'attendance_date' => $this->faker->date,
    //         'type' => $this->faker->randomElement(['Regular', 'Overtime', 'Half-Day', 'Vacation Leave', 'Sick Leave']),
    //         'time_in' => $this->faker->optional()->dateTime,
    //         'time_out' => $this->faker->optional()->dateTime,
    //         'late' => $this->faker->boolean,
    //         'overtime' => $this->faker->optional()->randomFloat(2, 0, 8), // assuming overtime can be up to 8 hours
    //         'undertime' => $this->faker->optional()->randomFloat(2, 0, 8), // assuming undertime can be up to 8 hours
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //     ];
    // }

    protected $model = Dailytimerecord::class;

    public function definition()
    {
        static $employeeDates = [];
    
        // Generate a unique employee_id
        $employeeId = 'SLE' . str_pad($this->faker->numberBetween(1, 10), 4, '0', STR_PAD_LEFT);
    
        // Initialize employee dates if not already set
        if (!isset($employeeDates[$employeeId])) {
            $employeeDates[$employeeId] = [];
    
            // Generate one date for each day of each month
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
    
            while ($startDate <= $endDate) {
                $currentMonthStart = $startDate->copy()->startOfMonth();
                $currentMonthEnd = $startDate->copy()->endOfMonth();
    
                // Add one date for each day in the month
                for ($date = $currentMonthStart; $date <= $currentMonthEnd; $date->addDay()) {
                    $employeeDates[$employeeId][] = $date->copy()->startOfDay();
                }
    
                // Move to the next month
                $startDate->addMonth();
            }
    
            // Shuffle the list of dates for randomness
            shuffle($employeeDates[$employeeId]);
        }
    
        // Check if there are any dates left for this employee
        if (empty($employeeDates[$employeeId])) {
            // If no dates are left, fallback to the current date
            $date = Carbon::now()->startOfDay();
        } else {
            // Pick a unique date for this record
            $date = array_pop($employeeDates[$employeeId]);
        }
    
        // Define normal working hours
        $workStart = $date->copy()->setTime(8, 0); // 8:00 AM
        $workEnd = $date->copy()->setTime(17, 0);  // 5:00 PM
    
        // Generate time_in on the selected date
        $timeIn = $date->copy()->setTime($this->faker->numberBetween(7, 10), $this->faker->numberBetween(0, 59));
    
        // Generate time_out on the same day or the next day
        $timeOut = $this->faker->boolean(80)  // 80% chance for the same day
            ? $timeIn->copy()->addHours($this->faker->numberBetween(1, 12)) // Same day, later time
            : $timeIn->copy()->addDay()->setTime($this->faker->numberBetween(0, 23), $this->faker->numberBetween(0, 59)); // Next day
    
        // Ensure time_out does not exceed one day from time_in
        if ($timeOut->greaterThan($timeIn->copy()->addDay())) {
            $timeOut = $timeIn->copy()->addDay()->setTime($this->faker->numberBetween(0, 23), $this->faker->numberBetween(0, 59));
        }
    
        // Calculate overtime and undertime
        $overtime = $timeOut->greaterThan($workEnd) ? $timeOut->diffInMinutes($workEnd) / 60 : 0;
        $undertime = $timeIn->lessThan($workStart) ? $workStart->diffInMinutes($timeIn) / 60 : 0;
    
        return [
            'employee_id' => $employeeId,
            'attendance_date' => $date->format('Y-m-d'),
            'type' => $this->faker->randomElement(['Wholeday', 'Overtime', 'Half-Day', 'Undertime', 'Vacation Leave Half-Day', 'Sick Leave Full-Day']),
            'time_in' => $timeIn->format('Y-m-d H:i:s'),
            'time_out' => $timeOut->format('Y-m-d H:i:s'),
            'late' => $this->faker->boolean,
            'overtime' => $overtime > 0 ? $overtime : null,
            'undertime' => $undertime > 0 ? $undertime : null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    
    
    
}
