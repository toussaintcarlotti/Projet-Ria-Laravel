<?php

namespace App\Http\Controllers;

use App\Actions\CreateEnseignant;
use App\Actions\UpdateEnseignant;
use App\Models\Enseignant;
use App\Models\Filiere;
use App\Models\User;
use Illuminate\Http\Request;

class EnseignantsController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::paginate(10);
        return view('pages.enseignants.index', compact('enseignants'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        return view('pages.enseignants.create', compact('filieres'));
    }

    public function store(Request $request)
    {
        CreateEnseignant::run($request->all());

        return redirect()->route('teachers.index')->with('success', 'Enseignant ajouté avec succès');
    }

    public function show(Enseignant $enseignant)
    {
    }

    public function edit(Enseignant $enseignant)
    {
        $filieres = Filiere::all();
        return view('pages.enseignants.edit', compact('enseignant', 'filieres'));
    }

    public function update(Request $request, Enseignant $enseignant)
    {
        UpdateEnseignant::run($request->all(), $enseignant);
        return redirect()->route('teachers.index')->with('success', 'Enseignant modifié avec succès');
    }

    public function destroy(Enseignant $enseignant)
    {
        $enseignant->user->delete();
        $enseignant->delete();
        return redirect()->route('teachers.index')->with('success', 'Enseignant supprimé avec succès');
    }
}
