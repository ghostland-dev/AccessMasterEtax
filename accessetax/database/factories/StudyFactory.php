<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Study>
 */
class StudyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_etude' => $this->faker->word,
            'nom_client' => $this->faker->word,
            'nom_contact' => $this->faker->word,
            'nom_responsable' => $this->faker->name ,
            'date_debut' => $this->faker->date,
            'date_fin' => $this->faker->date,
        ];
    }
}
