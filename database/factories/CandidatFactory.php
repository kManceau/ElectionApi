<?php

namespace Database\Factories;

use App\Models\Candidat;
use App\Models\Election;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidat>
 */
class CandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => rand(18, 70),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Candidat $candidat) {
            $i = 0;
            while($i < 5) {
                $election = Election::inRandomOrder()->first();
                $candidat->elections()->attach($election);
                $i++;
            }
        });
    }
}
