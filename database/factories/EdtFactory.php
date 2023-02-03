<?php

namespace Database\Factories;

use App\Models\Edt;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EdtFactory extends Factory
{
    protected $model = Edt::class;

    public function definition(): array
    {
        $date_debut = today()->addDays($this->faker->numberBetween(0, 60))->addHours($this->faker->numberBetween(8, 14));
        $date_fin = $date_debut->copy()->addHours($this->faker->numberBetween(1, 5));
        return [
            'cours_id' => $this->faker->numberBetween(1, 250),
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'information' => $this->faker->text(60),
        ];
    }
}
