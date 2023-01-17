<?php

namespace Database\Factories;

use App\Models\Cours;
use App\Models\Etudiant;
use App\Models\Note;
use App\Models\Ue;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition(): array
    {
        $etudiant = Etudiant::find($this->faker->numberBetween(1, 400));
        $ue = $etudiant->filiere->ues->random();
        $cours = $ue?->cours->first();


        while ($cours === null || $etudiant === null) {
            $etudiant = Etudiant::find($this->faker->numberBetween(1, 400));
            $ue = $etudiant->filiere->ues->random();
            $cours = $ue?->cours->first();
        }

        return [
            'etudiant_id' => $etudiant,
            'cours_id' => $cours,
            'nom_examen' => $this->faker->word(),
            'note' => $this->faker->numberBetween(0, 20),
        ];
    }
}
