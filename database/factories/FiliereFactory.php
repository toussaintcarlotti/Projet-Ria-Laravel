<?php

namespace Database\Factories;

use App\Models\Enseignant;
use App\Models\Filiere;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class FiliereFactory extends Factory
{
    protected $model = Filiere::class;
    static int $i = 1;

    public function definition(): array
    {
        $niveau = $this->faker->randomElement(['Licence', 'Master', 'Doctorat']);
        if ($niveau === 'Licence') {
            $nombre_annee = 3;
        } elseif ($niveau === 'Master') {
            $nombre_annee = 2;
        } else {
            $nombre_annee = 3;
        }

        $date = Carbon::now();
        $responsable_id = $this->faker->numberBetween(1, 20);
        self::$i += 1;
        return [
            'responsable_id' => $responsable_id,
            'nom' => $this->faker->unique()->randomElement(['Informatique', 'Mathématique', 'Physique', 'Chimie',
                'Biologie', 'Géologie', 'Géographie', 'Histoire', 'Philosophie', 'Lettres', 'Langues', 'Droit',
                'Economie', 'Sciences Politiques', 'Psychologie', 'Sociologie', 'Médecine', 'Pharmacie',
                'Kinésithérapie', 'Odontologie']),
            'description' => $this->faker->text(100),
            'niveau' => $niveau,
            'date_debut' => $date,
            'date_fin' => $date->addYears($nombre_annee),
            'nombre_annee' => $nombre_annee,
        ];
    }
}
