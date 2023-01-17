<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run()
    {
        Note::factory()
            ->times(1000)
            ->create();
    }
}
