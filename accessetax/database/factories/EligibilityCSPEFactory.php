<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EligibilityCSPE>
 */
class EligibilityCSPEFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'valuer_ajoutee' => $this->faker->randomDigitNotNull,
            'car_gaz' => $this->faker->randomDigitNotNull,
            'car_elec' => $this->faker->randomDigitNotNull,
            'car_autre' => $this->faker->randomDigitNotNull,
            'valeur_production' => $this->faker->randomDigitNotNull,
            'achat_prod_gaz' => $this->faker->randomDigitNotNull,
            'achat_prod_petrol' => $this->faker->randomDigitNotNull,
            'achat_chatleur' => $this->faker->randomDigitNotNull,
            'achat_autres_prod' => $this->faker->randomDigitNotNull,
            'eligibilite' => $this->faker->randomDigitNotNull,
        ];
    }
}
