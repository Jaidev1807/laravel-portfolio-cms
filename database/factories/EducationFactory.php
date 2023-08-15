<?php

namespace Database\Factories;
use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'institution' => $this->faker->word . ' University',
            'degree' => $this->faker->randomElement(['Bachelor', 'Master', 'PhD']),
            'major' => $this->faker->word,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'description' => $this->faker->paragraph,
        ];
    }
}
