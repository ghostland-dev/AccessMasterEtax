<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EligibilityTCGN>
 */
class EligibilityTCGNFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Validation03' => true,
            'Validation02' => true,
            'Validation01' => true,
            'fullvalidation' => true,
            'esitmationEconomie' => $this->faker->randomDigitNotNull(),
            'SommeTotalTaxElecPlein' => $this->faker->randomDigitNotNull(),
            'SommeTotalTaxGazPlein' => $this->faker->randomDigitNotNull(),
            'SommeTotalTaxTCGNReduit' => $this->faker->randomDigitNotNull(),
            'chiffreAffaireBrut_AE' => $this->faker->randomDigitNotNull(),
            'chiffreAffaireNet_AE' => $this->faker->randomDigitNotNull(),
            'valeurAjouterEuro' => $this->faker->randomDigitNotNull(),
            'consumAnGazKwh' => $this->faker->randomDigitNotNull(),
            'consumAnElecKwh' => $this->faker->randomDigitNotNull(),
            'valeurProduction' => $this->faker->randomDigitNotNull(),
            'achatGaz' => $this->faker->randomDigitNotNull(),
            'achatPetroliers' => $this->faker->randomDigitNotNull(),
            'achatChaleur' => $this->faker->randomDigitNotNull(),
            'autres' => $this->faker->randomDigitNotNull(),
            'consumAnAutreKwh' => $this->faker->randomDigitNotNull(),
            'pourcentageConsuPorcessus' => $this->faker->randomDigitNotNull(),
            'NaceCode' => $this->faker->randomDigitNotNull(),
            'combustionProcessus' => false,
            'siren' => $this->faker->randomDigitNotNull(),
            'study_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
