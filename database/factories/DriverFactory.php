<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Driver;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Driver::class;
    
    public function definition(): array
    {
    
             $driversData = [
                // Red Bull
                ['name' => 'Max Verstappen', 'team' => 'Red Bull', 'country' => 'Netherlands', 'number' => 1, 'age' => 28],
                ['name' => 'Yuki Tsunoda', 'team' => 'Red Bull', 'country' => 'Japan', 'number' => 22, 'age' => 25],
                // Ferrari
                ['name' => 'Charles Leclerc', 'team' => 'Ferrari', 'country' => 'Monaco', 'number' => 16, 'age' => 28],
                ['name' => 'Lewis Hamilton', 'team' => 'Ferrari', 'country' => 'United Kingdom', 'number' => 44, 'age' => 40],
                // McLaren
                ['name' => 'Lando Norris', 'team' => 'McLaren', 'country' => 'United Kingdom', 'number' => 4, 'age' => 26],
                ['name' => 'Oscar Piastri', 'team' => 'McLaren', 'country' => 'Australia', 'number' => 81, 'age' => 24],
                // Mercedes
                ['name' => 'George Russell', 'team' => 'Mercedes', 'country' => 'United Kingdom', 'number' => 63, 'age' => 27],
                ['name' => 'Andrea Kimi Antonelli', 'team' => 'Mercedes', 'country' => 'Italy', 'number' => 12, 'age' => 19],
                // Aston Martin
                ['name' => 'Fernando Alonso', 'team' => 'Aston Martin', 'country' => 'Spain', 'number' => 14, 'age' => 44],
                ['name' => 'Lance Stroll', 'team' => 'Aston Martin', 'country' => 'Canada', 'number' => 18, 'age' => 27],
                // Alpine
                ['name' => 'Pierre Gasly', 'team' => 'Alpine', 'country' => 'France', 'number' => 10, 'age' => 29],
                ['name' => 'Franco Colapinto', 'team' => 'Alpine', 'country' => 'Argentina', 'number' => 43, 'age' => 22],
                // Williams
                ['name' => 'Alex Albon', 'team' => 'Williams', 'country' => 'Thailand', 'number' => 23, 'age' => 29],
                ['name' => 'Carlos Sainz', 'team' => 'Williams', 'country' => 'Spain', 'number' => 55, 'age' => 31],
                // Racing Bulls (RB)
                ['name' => 'Liam Lawson', 'team' => 'Racing Bulls', 'country' => 'New Zealand', 'number' => 30, 'age' => 23],
                ['name' => 'Isack Hadjar', 'team' => 'Racing Bulls', 'country' => 'France', 'number' => 6, 'age' => 21],
                // Sauber (Kick Sauber/Audi)
                ['name' => 'Nico Hülkenberg', 'team' => 'Sauber', 'country' => 'Germany', 'number' => 27, 'age' => 38],
                ['name' => 'Gabriel Bortoleto', 'team' => 'Sauber', 'country' => 'Brazil', 'number' => 5, 'age' => 21],
                // Haas
                ['name' => 'Esteban Ocon', 'team' => 'Haas', 'country' => 'France', 'number' => 31, 'age' => 29],
                ['name' => 'Oliver Bearman', 'team' => 'Haas', 'country' => 'United Kingdom', 'number' => 87, 'age' => 20],
            ];

            $driver = $this->faker->randomElement($driversData);

            return [
                'name' => $driver['name'],
                'team' => $driver['team'],
                'country' => $driver['country'],
                'number' => $driver['number'],
                'age' => $driver['age'],
                'photo_url' => $this->faker->imageUrl(400, 400, 'people',true, $driver['name']),
            ];

        
    }
}
