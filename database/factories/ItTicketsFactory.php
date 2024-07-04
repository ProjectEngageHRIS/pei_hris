<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ittickets>
 */
class ItTicketsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employee_id = "SLE0001";
        return [
        'application_date' => Carbon::now(),
        'status' => $this->faker->randomElement(['open', 'closed', 'in progress']),
        'employee_id' => $employee_id,
        'description' => $this->faker->text(5000),
        'cancelled_at' => $this->faker->boolean ? $this->faker->dateTime : null,
        ];
    }
}
