<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Oefentoets>
 */
class OefentoetsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vak_id' => $this->faker->randomDigit(100),
            'onderwerp' => $this->faker->sentence(),
            'titel' => $this->faker->sentence(),
            'gebruiker_id' => $this->faker->randomDigit(100),
            'jaarlaag' => $this->faker->randomDigit(6),
            'school_id' => $this->faker->randomDigit(100),
            'niveau' => 'VWO',
            'beschrijving' => $this->faker->sentence(),
            'examenstof' => true, // 'true' or 'false
            'opgaven' => $this->faker->sentence(),
            'bijlage' => $this->faker->sentence(),
            'antwoorden' => $this->faker->sentence(),
            'normering' => $this->faker->sentence(),
            'lesstof' => $this->faker->sentence(),
        ];
    }
}
