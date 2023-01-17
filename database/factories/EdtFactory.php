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
        $date_debut = Carbon::parse("2023-01-01")->addDays($this->faker->numberBetween(0, 30))->addHours($this->faker->numberBetween(8, 14));
        $date_fin = $date_debut->copy()->addHours($this->faker->numberBetween(1, 5));
        return [
            'cours_id' => $this->faker->numberBetween(1, 100),
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'information' => $this->faker->word(),
        ];
    }
}
