<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarbonLique>
 */
class CarbonLiqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom'=> $this->faker->word,
            'code_2' => $this->faker->company,
            'code_1' => $this->faker->word,
            'eligible' => true, 
        ];
    }
}
