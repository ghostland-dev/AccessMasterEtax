<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElecBill>
 */
class ElecBillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [ 
            'nom_facture' => $this->faker->word,
            'fournisseur' => $this->faker->word,
            'type' => $this->faker->word,
            'numero_facture' => $this->faker->word,
            'numero_contrat' => $this->faker->word,
            'numero_compteur' => $this->faker->word,
            'numero_client' => $this->faker->word,
            'numero_site' => $this->faker->word,
            'numero_etude' => $this->faker->word,
            'consommation' => $this->faker->randomFloat(2, 0, 9999999999),
            'annee' => $this->faker->randomDigitNotNull,
            'elec_contract_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
