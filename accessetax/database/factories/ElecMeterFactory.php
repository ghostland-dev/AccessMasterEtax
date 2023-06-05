<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElecMeter>
 */
class ElecMeterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_compteur' => $this->faker->word,
            'PDL' => $this->faker->word,
            'puissance' => $this->faker->randomDigitNotNull,
            'numero_client' => $this->faker->word,
            'numero_site' => $this->faker->word,
            'numero_etude' => $this->faker->word,
            'numero_contrat'  => $this->faker->word,
            'fournisseur' => $this->faker->word,
            'profile' => 1,
            'consommation' => $this->faker->randomDigitNotNull,
            'annee' => $this->faker->randomDigitNotNull,
            'study_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
