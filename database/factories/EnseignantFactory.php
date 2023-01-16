<?php

namespace Database\Factories;

use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EnseignantFactory extends Factory
{
    protected $model = Enseignant::class;

    static int $i = 0;

    public function definition(): array
    {
        self::$i+=1;
        return [
            'user_id' => function () {
                return User::factory()->create([
                    'profile_id' => self::$i,
                    'nom' => $this->faker->lastName,
                    'prenom' => $this->faker->firstName,
                    'email' => $this->faker->unique()->safeEmail(),
                    'mail_univ' => $this->faker->firstName . $this->faker->lastName . '@univ-corse.fr',
                    'status' => 'enseignant',
                    'role_id' => $this->faker->numberBetween(2, 3),
                ])->id;
            },
            'responsabilite_enseignant' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
