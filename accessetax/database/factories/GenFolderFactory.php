<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GenFolder>
 */
class GenFolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero_dossier' => $this->faker->word,
            'statut_dossier' => 1, 
            'attestation_non_rembourse' => $this->faker->url,
            'pouvoir_client' => $this->faker->url,
            'contrat_de_prestation' => $this->faker->url,
            'demande_rembourse'   => $this->faker->url,
            'courrier_cerfa'      => $this->faker->url,
            'client_cerfa_14317_07' => $this->faker->url,
            'client_cerfa_14318_08' => $this->faker->url,
            'client_cerfa_14700_03' => $this->faker->url,
            'client_cerfa_14319'    => $this->faker->url,
            'client_pouvoir_ae'     => $this->faker->url,
            'proposition_service' => $this->faker->url,
            'base_folder_id' =>   $this->faker->randomDigitNotNull,
        ];
    }
}
