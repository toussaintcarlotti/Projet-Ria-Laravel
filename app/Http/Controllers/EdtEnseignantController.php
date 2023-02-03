<?php

namespace App\Http\Controllers;

use App\Models\Edt;
use App\Models\Enseignant;
use App\Models\Etudiant;
use Carbon\Carbon;

class EdtEnseignantController extends Controller
{
    public function show(Enseignant $enseignant)
    {
        $edts = $enseignant->formatedEdt;

        return view('pages.enseignants.edts.show', compact('edts', 'enseignant'));
    }

    public function create()
    {
        return view('pages.enseignants.edts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'cours_id' => ['required', 'exists:cours,id'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
            'information' => ['nullable'],
        ]);

        $edt = Edt::create($data);

        return redirect()->route('enseignants.edts.show', $edt->cours->enseignant);
    }
}
