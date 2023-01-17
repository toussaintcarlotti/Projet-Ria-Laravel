<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Enseignant;
use App\Models\Etudiant;

class EtudiantsEnseignantsController extends Controller
{
    public function index(Enseignant $enseignant)
    {
        $filiere_id_list = $enseignant->cours->map(function ($cours) {
            return $cours->ue?->filiere_id;
        })->unique();
        $etudiants = Etudiant::whereIn('filiere_id', $filiere_id_list)->paginate(10);
        return view('pages.enseignants.etudiants.index', compact('etudiants', 'enseignant'));
    }

    public function show(Enseignant $enseignant, Etudiant $etudiant)
    {

        $cours = $etudiant->filiere->ues->map(function ($ue) use ($enseignant) {
            return $ue->cours->where('enseignant_id', $enseignant->id);
        })->flatten();

        return view('pages.enseignants.etudiants.show', compact('etudiant', 'cours'));
    }
}
