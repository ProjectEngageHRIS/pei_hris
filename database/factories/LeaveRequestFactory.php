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

        $emails = [
            "jsodsod@projectengage.com.ph",
            "sherwinmalabanan@sltemps.com",
            "esalvador@projectengage.com.ph",
            "kcastro@projectengage.com.ph",
            "jazz@wesearch.com.ph",
            "rmaubay@projectengage.com.ph",
            "jmb@sltemps.com",
            "spm_2009@wesearch.com.ph",
            "rb@sltemps.com",
            "mbaniqued@projectengage.com.ph",
            "rosanne.espedido@sltemps.com",
            "trishesporlas@wesearch.com.ph",
            "ecapistrano@projectengage.com.ph",
            "khriziemisenas@sltemps.com",
            "chisilva@sltemps.com"
        ];

        $options = [
            "Vacation Leave",
            "Sick Leave",
            "Maternity Leave",
            "Paternity Leave",
            "Magna Carta Leave",
            "Credit Leave",
            "Advise Slip",
            "Others"
        ];

        return [
            'employee_id' => 'SLE0002',
            'status' => $this->faker->randomElement(['reviewing', 'approved', 'denied']),
            'supervisor_email' => $this->faker->randomElement($emails),
            'application_date' => $this->faker->date(),
            'mode_of_application' => $this->faker->randomElement($options),
            'inclusive_start_date' => $start_date,
            'inclusive_end_date' => $end_date,
            'deduct_to' => $this->faker->randomElement(['Salary', 'Credits']),
            'num_of_days_work_days_applied' => 5,
            'date_earned' => $this->faker->date(),
            'earned_description' => $this->faker->sentence,
            'purpose_type' => $this->faker->word,
            'reason' => $this->faker->paragraph,
            'cancelled_at' => $this->faker->boolean ? $this->faker->dateTime : null,
        ];
    }
}
