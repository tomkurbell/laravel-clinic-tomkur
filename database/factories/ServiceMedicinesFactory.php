<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceMedicines>
 */
class ServiceMedicinesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'category' => $this->faker->randomElement(['medicines', 'consultation', 'others']),
            'price' => $this->faker->randomFloat(2,0, 99999999999.99),
            'quantity' => $this->faker->randomNumber(),
        ];
    }
}
