<?php

namespace App\Http\Controllers;

use App\Models\Edt;
use App\Models\Etudiant;
use App\Models\Filiere;
use Carbon\Carbon;

class EdtFiliereController extends Controller
{
    public function show(Filiere $filiere)
    {
        $edts = $filiere->formatedEdt;

        return view('pages.filieres.edts.show', compact('edts'));
    }

    public function create()
    {

        return view('pages.filieres.edts.create');
    }

    public function store()
    {

    }
}
