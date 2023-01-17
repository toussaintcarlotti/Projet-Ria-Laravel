<?php

namespace Database\Seeders;

use App\Models\Edt;
use Illuminate\Database\Seeder;

class EdtSeeder extends Seeder
{
    public function run()
    {
        Edt::factory()
            ->times(1000)
            ->create();
    }
}
