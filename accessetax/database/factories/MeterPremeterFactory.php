<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MeterPremeter>
 */
class MeterPremeterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'compteur_c5' => $this->faker->randomDigitNotNull,
            'compteur_c4' => $this->faker->randomDigitNotNull,
            'compteur_hta' => $this->faker->randomDigitNotNull,
            'compteur_t2' => $this->faker->randomDigitNotNull,
            'compteur_t3' => $this->faker->randomDigitNotNull,
            'compteur_t4' => $this->faker->randomDigitNotNull,
            'company_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
