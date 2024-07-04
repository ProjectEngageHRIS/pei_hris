<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hrticket>
 */
class HrTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => "SLE0001",
            'status' => $this->faker->randomElement(['reviewing', 'approved', 'denied']),
            'application_date' => $this->faker->date(),
            'concerned_employee' => $this->faker->name,
            'type_of_ticket' => $this->faker->word,
            'type_of_request' => $this->faker->word,
            'sub_type_of_request' => $this->faker->word,
            'type_of_pe_hr_ops' => $this->faker->word,
            'account_client_hr_ops' => $this->faker->word,
            'request_requested' => $this->faker->sentence,
            'purpose' => $this->faker->sentence,
            'type_of_hrconcern' => $this->faker->word,
            'condition_availability' => $this->faker->sentence,
            'request_extra' => $this->faker->sentence,
            'request_assigned' => $this->faker->sentence,
            'request_link' => $this->faker->url,
            'request_date' => $this->faker->date(),
            'request_others' => json_encode($this->faker->words(3)),
            'cancelled_at' => $this->faker->boolean ? $this->faker->dateTime : null,
        ];
    }
}
