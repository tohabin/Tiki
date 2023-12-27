<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bus_no' => $this->faker->unique()->word,
            'driver_id' => \App\Models\User::factory(),
            'location_id' => \App\Models\Location::factory(),
            'depart_time' => $this->faker->dateTime(),
        ];
    }
}
