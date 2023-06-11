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


        $fournisseurs = [
            ['nom' => 'EDF', 'type' => 'électricité'],
            ['nom' => 'Engie', 'type' => 'gaz'],
            ['nom' => 'Total Direct Energie', 'type' => 'électricité'],
            ['nom' => 'Eni', 'type' => 'gaz'],
            ['nom' => 'Planète OUI', 'type' => 'électricité'],
            ['nom' => 'Vattenfall', 'type' => 'électricité'],
            ['nom' => 'ekWateur', 'type' => 'électricité'],
            ['nom' => 'Iberdrola', 'type' => 'électricité'],
            ['nom' => 'Sowee', 'type' => 'électricité'],
            ['nom' => 'Plüm Energie', 'type' => 'électricité'],
            ['nom' => 'Butagaz', 'type' => 'gaz'],
            ['nom' => 'Lucia', 'type' => 'électricité'],
            ['nom' => 'Happ-e', 'type' => 'électricité'],
            ['nom' => 'Energies Leclerc', 'type' => 'électricité'],
            ['nom' => 'CDiscount Énergie', 'type' => 'électricité'],
            ['nom' => 'Ohm Énergie', 'type' => 'électricité'],
            ['nom' => 'Enercoop', 'type' => 'électricité'],
            ['nom' => 'Gaz de Bordeaux', 'type' => 'gaz'],
            ['nom' => 'Sélia', 'type' => 'électricité'],
            ['nom' => 'Antargaz', 'type' => 'gaz'],
            ['nom' => 'Ekwation', 'type' => 'électricité'],
            ['nom' => 'Lucia', 'type' => 'gaz'],
            ['nom' => 'Mint Énergie', 'type' => 'électricité'],
            ['nom' => 'Butagaz', 'type' => 'gaz'],

        ];



        return [
            'logo' => $this->faker->url(),
            'nom_fournisseur' => $fournisseurs[$this->faker->numberBetween(0, 15)]['nom'],
            'contact' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            'fournisseur_electrcite' =>   $this->faker->randomElement([true, false]),
            'fournisseur_gaz' =>  $this->faker->randomElement([true, false]),
            'address' => $this->faker->address(),
            'city' => $this->faker->city,
            'country' => $this->faker->country(),
            'zip_code' => $this->faker->postCode(),
            'siret' => $this->faker->iban(),
            'energie' => $this->faker->numberBetween(1, 3),

        ];
    }
}
