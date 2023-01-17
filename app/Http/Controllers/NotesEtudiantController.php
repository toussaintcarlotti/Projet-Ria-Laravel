<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;

class NotesEtudiantController extends Controller
{
    public function __invoke(Etudiant $etudiant)
    {
        $notes = $etudiant->notes()->paginate(10);
        return view('pages.etudiants.notes.index', compact('notes', 'etudiant'));
    }
}
