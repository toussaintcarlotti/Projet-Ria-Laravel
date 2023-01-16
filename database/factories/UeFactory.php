<?php

namespace Database\Factories;

use App\Models\Ue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UeFactory extends Factory
{
    protected $model = Ue::class;

    public function definition(): array
    {
        return [
            'filiere_id' => $this->faker->numberBetween(1, 20),
            'libelle' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}
