<?php

namespace Database\Factories;

use App\Models\Cours;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CoursFactory extends Factory
{
    protected $model = Cours::class;

    public function definition(): array
    {
        return [
            'enseignant_id' => $this->faker->numberBetween(1, 50),
            'matiere_id' => $this->faker->numberBetween(1,22),
            'horaire_debut' => $this->faker->time(),
            'horaire_fin' => $this->faker->time(),
            'type_cours' => $this->faker->randomElement(['TD', 'TP']),
        ];
    }
}
