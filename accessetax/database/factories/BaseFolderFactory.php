<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BaseFolder>
 */
class BaseFolderFactory extends Factory
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
            'statut_dossier' => $this->faker->randomElement(['en attente', 'en cours', 'traité', 'prêt à envoyé', 'envoyé', 'confirmé', 'rélgé', 'finalisé']),
            'nom_dossier' => $this->faker->word,
            'nom_client' => $this->faker->word,
            'study_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
