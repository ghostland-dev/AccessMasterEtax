<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GazBill>
 */
class GazBillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_facture' => $this->faker->randomDigit(111111, 999999),
            'fournisseur' => $this->faker->company(),
            'fichier' => $this->faker->imageUrl(),
            'date_debut' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'date_fin' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'type' => $this->faker->randomElement(['estimative', 'réelle']),
            'numero_facture' => $this->faker->randomDigit(1000, 999999),
            'numero_contrat' => $this->faker->randomDigit(1000, 999999),
            'numero_compteur' => $this->faker->randomDigit(1000, 999999),
            'numero_client' => $this->faker->randomDigit(1000, 999999),
            'numero_site' => $this->faker->randomDigit(1000, 999999),
            'numero_etude' => $this->faker->randomDigit(1000, 999999),
            'consommation' => $this->faker->randomFloat(2, 1000, 999999),
            'annee' => $this->faker->year(),
            'gaz_contract_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
