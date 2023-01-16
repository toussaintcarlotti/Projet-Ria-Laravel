<?php

namespace App\Http\Controllers;

use App\Actions\CreateEtudiant;
use App\Actions\UpdateEtudiant;
use App\Http\Requests\EtudiantRequest;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EtudiantsController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::paginate(10);
        return view('pages.etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        return view('pages.etudiants.create', compact('filieres'));
    }

    public function store(EtudiantRequest $request)
    {
        CreateEtudiant::run($request->all());

        return redirect()->route('students.index')->with('success', 'Etudiant ajouté avec succès');
    }

    public function show(Etudiant $etudiant)
    {
    }

    public function edit(Etudiant $etudiant)
    {
        $filieres = Filiere::all();
        return view('pages.etudiants.edit', compact('etudiant', 'filieres'));
    }

    public function update(EtudiantRequest $request, Etudiant $etudiant)
    {
        UpdateEtudiant::run($request->all(), $etudiant);

        return redirect()->route('students.index')->with('success', 'Etudiant modifié avec succès');
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->user->delete();
        $etudiant->delete();
        return redirect()->route('students.index')->with('success', 'Etudiant supprimé avec succès');
    }
}
