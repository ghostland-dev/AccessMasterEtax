<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GazContract>
 */
class GazContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_contrat' => $this->faker->word,
            'fournisseur' => $this->faker->word,
            'fichier' => $this->faker->imageUrl,
            'date_debut'  => $this->faker->date('Y-m-d', 'now')  ,
            'date_fin' =>   $this->faker->date('Y-m-d', 'now'),
            'date_signature' => $this->faker->date('Y-m-d', 'now'),
            'gaz_meter_id' => $this->faker->randomDigitNotNull,
        ];
    }
}