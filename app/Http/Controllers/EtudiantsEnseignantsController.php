<?php

namespace App\Http\Controllers;

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
        return view('pages.enseignants.etudiants.index', compact('etudiants'));
    }
}
