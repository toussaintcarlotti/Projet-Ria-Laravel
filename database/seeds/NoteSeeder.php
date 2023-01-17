<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    public function run()
    {
        Note::factory()
            ->times(300)
            ->create();
    }
}
