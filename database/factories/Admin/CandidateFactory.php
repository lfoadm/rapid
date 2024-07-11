<?php

namespace Database\Factories\Admin;

use App\Models\Admin\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\PseudoTypes\True_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'      => $this->faker->name(),
            'surname'   => $this->faker->lastName(),
            'city_id'   => City::inRandomOrder()->first()->id,
            'number'    => $this->faker->randomNumber(),
            'acronym'   => $this->faker->colorName(),
            'status'    => true,
            'elected'   => false,
        ];
    }
}
