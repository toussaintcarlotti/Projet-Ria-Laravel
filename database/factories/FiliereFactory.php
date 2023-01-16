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
        $date = Carbon::now();
        $nb_annee = $this->faker->numberBetween(1, 5);
        $responsable_id = $this->faker->numberBetween(1, 20);
        Enseignant::find($responsable_id)->update([
            'responsable_filiere_id' => self::$i,
        ]);
        self::$i += 1;
        return [
            'responsable_id' => $responsable_id,
            'nom' => $this->faker->unique()->randomElement(['Informatique', 'Mathématique', 'Physique', 'Chimie',
                'Biologie', 'Géologie', 'Géographie', 'Histoire', 'Philosophie', 'Lettres', 'Langues', 'Droit',
                'Economie', 'Sciences Politiques', 'Psychologie', 'Sociologie', 'Médecine', 'Pharmacie',
                'Kinésithérapie', 'Odontologie']),
            'description' => $this->faker->text(100),
            'niveau' => $this->faker->randomElement(['Licence', 'Master', 'Doctorat']),
            'date_debut' => $date,
            'date_fin' => $date->addYears($nb_annee),
            'nombre_annee' => $nb_annee,
        ];
    }
}