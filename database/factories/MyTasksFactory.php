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

        
        return [
            'employee_id' => $employee_id,
            'application_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['pending', 'completed', 'in progress', 'cancelled']),
            'target_employees' => json_encode(array_map(function($key) use ($employeeids) {
                return $employeeids[$key];
            }, array_rand($employeeids, rand(2, 5)))),
            'task_title' => $this->faker->sentence(rand(3, 10)),
            'assigned_task' => $this->faker->paragraph,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'cancelled_at' => $this->faker->boolean ? $this->faker->dateTime : null,
        ];
    }
}
