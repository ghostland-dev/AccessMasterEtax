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
            'denomination' => $this->faker->company(),
            'siren' => $this->faker->randomFloat(0, 1000, 999999),
            'siret' =>  $this->faker->randomFloat(0, 1000, 999999),
            'tel' =>  $this->faker->phoneNumber(),
            'fix' =>  $this->faker->phoneNumber(),
            'email' =>  $this->faker->safeEmail(),
            'forme_juridique' => $this->faker->sentence(4),
            'forme_juridique_code' => $this->faker->randomDigitNotNull(),
            'capital' => $this->faker->randomDigitNotNull(),
            'effectif' => $this->faker->randomDigitNotNull(),
            'nb_dirigents' => $this->faker->randomDigitNotNull(),
            'categorie_juridique' => $this->faker->sentence(4),
            'adresse' => $this->faker->address(),
            'code_postal' => $this->faker->postcode(),
            'ville' => $this->faker->city(),
            'code_naf' => $this->faker->randomDigitNotNull(),
            'code_nace' => $this->faker->randomDigitNotNull(),
            'site_internet' => $this->faker->url(),
            'nic' => $this->faker->randomDigitNotNull(),
            'nic_siege' => $this->faker->randomDigitNotNull(),
            'date_creation' => $this->faker->date(),
            'date_radiation' => $this->faker->date(),
            'user_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
