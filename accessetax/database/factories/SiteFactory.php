<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->company(),
            'siret' => $this->faker->word(),
            'adresse' => $this->faker->address(),
            'code_postal' => $this->faker->postCode(),
            'ville' => $this->faker->city(),
            'pays' => $this->faker->country(),
            'telephone' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'consommation_electrcite' => $this->faker->randomDigitNotNull(),
            'consommation_gaz' => $this->faker->randomDigitNotNull(),
            'type' => $this->faker->word(),
            'company_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}