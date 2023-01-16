<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'admin',
            'directeur_etude',
            'directeur_departement',
            'etudiant',
        ];

        foreach ($roles as $role) {
            Role::create([
                'nom' => $role,
            ]);
        }
    }
}
