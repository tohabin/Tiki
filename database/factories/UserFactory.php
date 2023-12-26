<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // You may customize the password generation logic
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'nid' => $this->faker->randomNumber(9), // Adjust as needed
            'role' => $this->faker->randomElement(['Super_Admin', 'Admin', 'User', 'Restrict']),
            'position' => $this->faker->randomElement(['MD', 'Manager', 'Accountant', 'Ticket_Seller', 'Driver', 'Helper', 'Worker']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
