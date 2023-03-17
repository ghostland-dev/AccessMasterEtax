<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'fonction'=> $this->faker->word,
            'mobile' => $this->faker->phoneNumber,
            'fix' => $this->faker->phoneNumber,
            'adresse' => $this->faker->streetAddress,
            'code_postal' => $this->faker->postcode,
            'ville' => $this->faker->city,
            'pays' => $this->faker->country,
            'type' => $this->faker->word,
            'company_id' => $this->faker->randomDigitNotNull,
        ];
    }
}