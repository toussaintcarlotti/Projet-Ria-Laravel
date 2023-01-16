<?php

namespace Database\Seeders;

use App\Models\Matiere;
use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    public function run()
    {
        $matieres = [
            'Mathématiques',
            'Physique',
            'Chimie',
            'SVT',
            'Français',
            'Histoire',
            'Géographie',
            'Anglais',
            'Espagnol',
            'Allemand',
            'Italien',
            'Philosophie',
            'Arts plastiques',
            'Musique',
            'EPS',
            'Informatique',
            'Droit',
            'Economie',
            'Sciences Politiques',
            'Psychologie',
            'Sociologie',
            'Médecine',
        ];
        foreach ($matieres as $matiere) {
            Matiere::create([
                'libelle_matiere' => $matiere,
                'description_matiere' => 'Description de la matière ' . $matiere,
            ]);
        }
    }
}
