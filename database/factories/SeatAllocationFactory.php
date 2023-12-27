<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SeatAllocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trip_id' => \App\Models\Trip::factory(),
            'seat_no' => $this->faker->numberBetween(1, 36),
            'passenger_name' => $this->faker->name,
            'passenger_phone' => $this->faker->phoneNumber,
            'passenger_nid' => $this->faker->randomNumber(9),
            'price' => $this->faker->randomFloat(2, 20, 200),
        ];
    }
}
