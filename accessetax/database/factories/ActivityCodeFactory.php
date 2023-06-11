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
            'code_naf' => $this->faker->randomNumber(4),
            'code_nace' => $this->faker->randomNumber(4),
            'libelle_naf' => $this->faker->slug(4),
            'libelle_nace' => $this->faker->slug(4),


        ];
    }
}
