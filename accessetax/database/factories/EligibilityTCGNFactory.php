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
            'esitmationEconomie' => 12,
            'SommeTotalTaxElecPlein' => 12,
            'SommeTotalTaxGazPlein' => 12,
            'SommeTotalTaxTCGNReduit' => 12,
            'chiffreAffaireBrut_AE' => 12,
            'chiffreAffaireNet_AE' => 12,
            'valeurAjouterEuro' => 12,
            'consumAnGazKwh' => 12,
            'consumAnElecKwh' => 12,
            'valeurProduction' => 12,
            'achatGaz' => 12,
            'achatPetroliers' => 12,
            'achatChaleur' => 12,
            'autres' => 12,
            'consumAnAutreKwh' => 12,
            'pourcentageConsuPorcessus' => 12,
            'NaceCode' => 12,
            'combustionProcessus' => false,
            'study_id' => $this->faker->randomDigitNotNull(),
        ];
    }
}
