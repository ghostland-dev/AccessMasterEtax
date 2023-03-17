<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReducedTaxBoard>
 */
class ReducedTaxBoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->word,
            'consommation_mkw' => $this->faker->randomDigitNotNull,
            'remuneration' => $this->faker->randomDigitNotNull,
        ];
    }
}