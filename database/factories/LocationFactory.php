<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from' => $this->faker->city,
            'to' => $this->faker->city,
            'approx_cost' => $this->faker->randomFloat(2, 10, 100),
            'approx_time' => $this->faker->dateTime(),
        ];
    }
}
