<?php

namespace Database\Seeders;

use App\Models\Ue;
use Illuminate\Database\Seeder;

class UeSeeder extends Seeder
{
    public function run()
    {
        Ue::factory()
            ->times(100)
            ->create();
    }
}
