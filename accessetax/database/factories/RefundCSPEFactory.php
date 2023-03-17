<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefundCSPE>
 */
class RefundCSPEFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'annee' => $this->faker->randomDigitNotNull,
            'entreprise' => $this->faker->word,
            'siren' => $this->faker->word,
            'code_naf' => $this->faker->word,
            'veleur_ajoutee' => $this->faker->randomDigitNotNull,
            'car' => $this->faker->randomDigitNotNull, 
            'unite' => null,
            'date_verification' => null,
            'elegibilite_activite' => false, 
            'eliegibilite_elec_intense' => true, 
            'study_id' => $this->faker->randomDigitNotNull,
        ];
    }
}