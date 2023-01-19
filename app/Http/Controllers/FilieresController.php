<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiliereRequest;
use App\Models\Enseignant;
use App\Models\Filiere;
use App\Models\Ue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilieresController extends Controller
{
    public function index()
    {
        $filieres = Filiere::paginate(10);
        return view('pages.filieres.index', compact('filieres'));
    }

    public function create()
    {
        $enseignants = Enseignant::all()->sortBy('user.nom');
        $ues = UE::where('filiere_id', null)->get()->sortBy('nom');
        return view('pages.filieres.create', compact('enseignants', 'ues'));
    }

    public function store(FiliereRequest $request)
    {

        if ($request->niveau === 'Licence') {
            $nombre_annee = 3;
        } elseif ($request->niveau === 'Master') {
            $nombre_annee = 2;
        } else {
            $nombre_annee = 3;
        }

        Filiere::create(array_merge($request->validated(), ['nombre_annee' => $nombre_annee]));

        return redirect()->route('filieres.index')->with('success', 'Filière ajoutée avec succès');
    }

    public function show(Filiere $filiere)
    {
        return view('pages.filieres.show', compact('filiere'));
    }

    public function edit(Filiere $filiere)
    {
        $enseignants = Enseignant::all()->sortBy('user.nom');
        $ues = UE::all()->firstWhere('filiere_id', $filiere->id);
        return view('pages.filieres.edit', compact('filiere', 'enseignants', 'ues'));
    }

    public function update(FiliereRequest $request, Filiere $filiere)
    {
        $filiere->update($request->validated());
        return redirect()->route('filieres.index')->with('success', 'Filière modifiée avec succès');
    }

    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filieres.index')->with('success', 'Filière supprimée avec succès');
    }
}
