<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BaseDocument>
 */
class BaseDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cgv_access_anergies' => $this->faker->imageUrl(),
            'rib_entreprise' => $this->faker->imageUrl(),
            'kabis' => $this->faker->imageUrl(),
            'bilan_comptable_1' => $this->faker->imageUrl(),
            'bilan_comptable_2' => $this->faker->imageUrl(),
            'annexe_1' => $this->faker->imageUrl(),
            'annexe_2' => $this->faker->imageUrl(),
            'courrier_type' => $this->faker->imageUrl(),
            'confirmation_douanaire' => $this->faker->imageUrl(),
            'fichier_entreprise' => $this->faker->imageUrl(),
            'valeur_ajoutee' => $this->faker->imageUrl(),
            'base_folder_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
