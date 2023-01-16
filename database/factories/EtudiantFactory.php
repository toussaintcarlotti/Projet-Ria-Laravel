<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EtudiantFactory extends Factory
{
    protected $model = Etudiant::class;

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
                    'status' => 'etudiant',
                    'role_id' => 4
                ])->id;
            },
            'diplome_etudiant' => $this->faker->word(),
            'filiere_id' => $this->faker->numberBetween(1, 20),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
