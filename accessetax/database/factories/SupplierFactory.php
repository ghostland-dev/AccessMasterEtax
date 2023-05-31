<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'logo' => $this->faker->imageUrl(),
            'nom_fournisseur' => $this->faker->word(),
            'contact' => $this->faker->word(),
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            'fournisseur_electrcite' =>  true,
            'fournisseur_gaz' => true,
            'address' => $this->faker->address(),
            'city' => $this->faker->city,
            'country' => $this->faker->country(),
            'zip_code' => $this->faker->postCode(),
            'siret' => $this->faker->randomDigitNotNull(),
            'energie' => $this->faker->numberBetween(1, 3),

        ];
    }
}
