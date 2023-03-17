<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'denomenation' => $this->faker->company,
            'siren' => $this->faker->randomDigitNotNull,
            'siret' => $this->faker->randomDigitNotNull,
            'forme_juridique' => $this->faker->word,
            'forme_juridique_code' => $this->faker->word,
            'capital' => $this->faker->randomDigitNotNull,
            'effectif' => $this->faker->randomDigitNotNull,
             'nb_dirigents' => $this->faker->randomDigitNotNull,
            'categorie_juridique' => $this->faker->word,
            'adresse' => $this->faker->address,
            'code_postal' => $this->faker->postcode,
            'ville' => $this->faker->city,
            'code_naf' => $this->faker->randomDigitNotNull,
            'code_nace' => $this->faker->randomDigitNotNull,
            'site_internet' => $this->faker->url,
            'nic' => $this->faker->randomDigitNotNull,
            'nic_siege' => $this->faker->randomDigitNotNull,
            'date_creation' => $this->faker->date(),
            'date_radiation' => $this->faker->date(),
            'date_immatriculation' => $this->faker->date(),
            'date_immatriculation_rcs' => $this->faker->date(),
            'user_id' => $this->faker->randomDigitNotNull,
        ];
    }
}