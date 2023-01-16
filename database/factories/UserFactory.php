<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'role_id' => 1,
            'nom' => 'Toussaint',
            'prenom' => 'Carlotti',
            'email' => 'toussaint.carlotti@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password'),
            'status' => 'Admin',
            'mail_univ' => 'toussaint.carlotti@univ-corse.fr',
            'tel' => $this->faker->phoneNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
