<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefundTCGN>
 */
class RefundTCGNFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'valuer_ajoutee' => $this->faker->randomFloat(2, 0, 100),
            'car_gaz' => $this->faker->randomFloat(2, 0, 100),
            'car_elec' => $this->faker->randomFloat(2, 0, 100),
            'car_autre' => $this->faker->randomFloat(2, 0, 100),
            'valeur_production' => $this->faker->randomFloat(2, 0, 100),
            'achat_prod_gaz' => $this->faker->randomFloat(2, 0, 100),
            'achat_prod_petrol' => $this->faker->randomFloat(2, 0, 100),
            'achat_chatleur' => $this->faker->randomFloat(2, 0, 100),
            'achat_autres_prod' => $this->faker->randomFloat(2, 0, 100),
            'eligibilite' => $this->faker->randomFloat(2, 0, 100),
            'study_id' => $this->faker->randomDigitNotNull,
        ];
    }
}