<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Race;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Race::class;

    public function definition(): array
    {
        return [
            'grand_prix' => $this->faker->word . ' GP',
            'date' => $this->faker->dateTimeBetween('-1 month','+2 months'),
            'track' => $this->faker->city,
            'laps' => $this->faker->numberBetween(50, 70),
            'weather' => $this->faker->randomElement(['Sunny','Rainy','Cloudy']),
        ];
    }
}
