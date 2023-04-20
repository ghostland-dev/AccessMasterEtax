<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CodeNaf>
 */
class CodeNafFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_naf' => str($this->faker->randomNumber(5, true)),
            'libelle_naf' =>  $this->faker->sentence(),
            'eligible' => true,
        ];
    }
}
