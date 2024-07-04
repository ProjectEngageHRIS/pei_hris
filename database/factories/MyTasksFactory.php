<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mytasks>
 */
class MyTasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $startTime = $this->faker->dateTimeBetween('-1 month', 'now');
        $endTime = (clone $startTime)->modify('+'. rand(1, 10) .' hours');

        $employee_id = "SLE0001";
        return [
            'employee_id' => $employee_id,
            'application_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['pending', 'completed', 'in progress', 'cancelled']),
            'target_employees' => json_encode(['E' . $this->faker->randomNumber(5), 'E' . $this->faker->randomNumber(5)]),
            'task_title' => $this->faker->sentence(rand(3, 10)),
            'assigned_task' => $this->faker->paragraph,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'cancelled_at' => $this->faker->boolean ? $this->faker->dateTime : null,
        ];
    }
}
