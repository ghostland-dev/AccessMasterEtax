<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EligibilityCSPE>
 */
class EligibilityCSPEFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codeNaf' => $this->faker->randomDigitNotNull(),
            'valeurAjouter' => $this->faker->randomDigitNotNull(),
            'CAR' => $this->faker->randomDigitNotNull(),
            'CodeNafmessage' => "dede",
            'MotnantCSPETauxReduit' => $this->faker->randomDigitNotNull(),
            'CSPEtauxPlein' => $this->faker->randomDigitNotNull(),
            'EligibiliteReduit' => true,
            'RatioElectroIntense' => $this->faker->randomDigitNotNull(),
            'SoumisRisqueFuitCO2' => true,
            'NouveaTauxReduit' => $this->faker->randomDigitNotNull(),
            'RemboursementClient' => $this->faker->randomDigitNotNull(),
            'chiffreAffaireBrut_AE' => $this->faker->randomDigitNotNull(),
            'chiffreAffaireNet_AE' => $this->faker->randomDigitNotNull(),
            'study_id' => $this->faker->randomDigitNotNull(),


        ];
    }
}
