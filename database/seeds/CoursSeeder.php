<?php

namespace Database\Seeders;

use App\Models\Cours;
use Illuminate\Database\Seeder;

class CoursSeeder extends Seeder
{
    public function run()
    {
        Cours::factory()
            ->times(250)
            ->create();
    }
}
