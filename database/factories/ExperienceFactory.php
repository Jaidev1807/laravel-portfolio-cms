<?php

namespace Database\Factories;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position' => $this->faker->jobTitle,
            'company' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'start_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'end_date' => $this->faker->dateTimeBetween('-5 years', 'now'),
        ];
    }
}
