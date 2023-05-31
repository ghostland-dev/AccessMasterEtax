<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsible>
 */
class ResponsibleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'civilite' => $this->faker->randomElement(['Monsieur', 'Madame', 'Autre']),
            'nom_famille' => $this->faker->word,
            'prenom' => $this->faker->firstName,
            'fonction' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'fax' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
            'code_postal' => $this->faker->postcode,
            'ville' => $this->faker->city,
            'pays' => $this->faker->country,
            'date_naissance' => $this->faker->date,
            'company_id' => $this->faker->randomDigitNotNull,

        ];
    }
}
