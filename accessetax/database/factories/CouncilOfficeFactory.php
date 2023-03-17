<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CouncilOffice>
 */
class CouncilOfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'council_office_name'=> $this->faker->word,
            'council_office_address' => $this->faker->company,
            'nic_code' => $this->faker->word,
        ];
    }
}
