<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use Illuminate\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    public function run()
    {
        Etudiant::factory()
            ->times(50)
            ->create();
    }
}
