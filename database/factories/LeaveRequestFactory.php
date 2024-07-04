<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leaverequest>
 */
class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = $this->faker->dateTimeBetween('-2 months', 'now');
        $end_date = (clone $start_date)->modify('+5 days');

        return [
            'employee_id' => 'SLE0001',
            'status' => $this->faker->randomElement(['reviewing', 'approved', 'denied']),
            'supervisor_email' => $this->faker->email,
            'application_date' => $this->faker->date(),
            'mode_of_application' => $this->faker->randomElement(['online', 'paper']),
            'inclusive_start_date' => $start_date,
            'inclusive_end_date' => $end_date,
            'deduct_to' => $this->faker->randomElement(['annual_leave', 'sick_leave', 'unpaid_leave']),
            'num_of_days_work_days_applied' => 5,
            'date_earned' => $this->faker->date(),
            'earned_description' => $this->faker->sentence,
            'purpose_type' => $this->faker->word,
            'reason' => $this->faker->paragraph,
            'cancelled_at' => $this->faker->boolean ? $this->faker->dateTime : null,
        ];
    }
}
