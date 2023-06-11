<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alerte>
 */
class AlerteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_alerte' => $this->faker->name(),
            'description_alerte' => $this->faker->text(50),
            'type_alerte' => $this->faker->randomElement([1, 2, 3, 4]),
            'statut_alerte' => $this->faker->randomElement(['visualisé', 'nouveau']),
            'study_id' => $this->faker->randomDigitNotNull,
        ];
    }
}
