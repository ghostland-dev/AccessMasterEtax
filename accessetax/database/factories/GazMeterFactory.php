<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GazMeter>
 */
class GazMeterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PCE' => $this->faker->word,
            'siret' => $this->faker->word,
            'nom_site' => $this->faker->word,
            'nom_etude' => $this->faker->word,
            'nom_client' => $this->faker->word,
            'nom_contact' => $this->faker->word,
            'nom_responsable' => $this->faker->word,
            'profil' => 1,
            'tarif' => 1,
            'consommation_mentsauelle' => $this->faker->randomDigitNotNull,
            'consommation_annuelle' => $this->faker->randomDigitNotNull,
            'site_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
