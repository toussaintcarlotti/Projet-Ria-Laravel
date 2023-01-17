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
        $ue = Ue::all()->random();
        $cours = Cours::where('ue_id', $ue->id)->first();
        $etudiant = Etudiant::where('filiere_id', $ue->filiere_id)->first();

        while ($cours === null || $etudiant === null) {
            $ue = Ue::all()->random();
            $cours = Cours::where('ue_id', $ue->id)->first();
            $etudiant = Etudiant::where('filiere_id', $ue->filiere_id)->first();
        }

        return [
            'etudiant_id' => $etudiant,
            'cours_id' => $cours,
            'nom_examen' => $this->faker->word(),
            'note' => $this->faker->numberBetween(0, 20),
        ];
    }
}
