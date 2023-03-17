<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityCode>
 */
class ActivityCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_naf' => $this->faker->word,
            'code_nace' => $this->faker->word,
            'libelle_naf' => $this->faker->word,
            'libelle_nace' => $this->faker->word,


        ];
    }
}
