<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 'nik',
        // 'kk',
        // 'name',
        // 'phone',
        // 'email',
        // 'gender',
        // 'birth_place',
        // 'birth_date',
        // 'is_deceased',
        // 'address_line',
        // 'city',
        // 'city_code',
        // 'province',
        // 'province_code',
        // 'district',
        // 'district_code',
        // 'village',
        // 'village_code',
        // 'rt',
        // 'rw',
        // 'postal_code',
        // 'marital_status',
        // 'relationship_name',
        // 'relationship_phone',
        return [
            'nik' => $this->faker->numberBetween(0, 100),
            'kk' => $this->faker->numberBetween(0, 100),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'is_deceased' => $this->faker->boolean(),
            'address_line' => $this->faker->address(),
            'city' => $this->faker->city(),
            'city_code' => $this->faker->postcode(),
            'province' => $this->faker->city(),
            'province_code' => $this->faker->postcode(),
            'district' => $this->faker->city(),
            'district_code' => $this->faker->postcode(),
            'village' => $this->faker->city(),
            'village_code' => $this->faker->postcode(),
            'rt' => $this->faker->numberBetween(0, 5),
            'rw' => $this->faker->numberBetween(0, 3),
            'postal_code' => $this->faker->postcode(),
            'marital_status' => $this->faker->randomElement(['S', 'M', 'D']),
            'relationship_name' => $this->faker->name(),
            'relationship_phone' => $this->faker->phoneNumber(),
        ];
    }
}
