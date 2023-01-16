<?php

namespace Database\Seeders;

use App\Models\Enseignant;
use Illuminate\Database\Seeder;

class EnseignantSeeder extends Seeder
{
    public function run()
    {
        Enseignant::factory()
            ->times(50)
            ->create();
    }
}
