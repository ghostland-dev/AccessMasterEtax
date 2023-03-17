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
       'cgv_access_anergies'=> $this->faker->word,
       'rib_entreprise' => $this->faker->company,
       'kabis' => $this->faker->word,
       'bilan_comptable_1' => $this->faker->address,
       'bilan_comptable_2' => $this->faker->address,
       'annexe_1' => $this->faker->word,
       'annexe_2' => $this->faker->word,
       'courrier_type' => $this->faker->word,
       'confirmation_douanaire' => $this->faker->word,
       'fichier_entreprise' => $this->faker->word,
       'valeur_ajoutee' => $this->faker->word,
       'base_folder_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
