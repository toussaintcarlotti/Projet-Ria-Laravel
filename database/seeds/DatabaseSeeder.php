<?php

use Database\Seeders\AdminSeeder;
use Database\Seeders\CoursSeeder;
use Database\Seeders\EnseignantSeeder;
use Database\Seeders\EtudiantSeeder;
use Database\Seeders\FiliereSeeder;
use Database\Seeders\MatiereSeeder;
use Database\Seeders\NoteSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            EnseignantSeeder::class,
            EtudiantSeeder::class,
            RoleSeeder::class,
            FiliereSeeder::class,
            MatiereSeeder::class,
            CoursSeeder::class,
            UeSeeder::class,
            NoteSeeder::class,
        ]);
    }
}
