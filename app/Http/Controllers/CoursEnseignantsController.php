<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursesRequest;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Ue;

class CoursEnseignantsController extends Controller
{
    public function index(Enseignant $enseignant)
    {
        $cours = $enseignant->cours()->paginate(10);

        return view('pages.enseignants.cours.index', compact('cours', 'enseignant'));
    }

    public function create(Enseignant $enseignant)
    {
        $matieres = Matiere::all();
        $ues = Ue::all();
        return view('pages.enseignants.cours.create', compact('enseignant', 'matieres', 'ues'));
    }

    public function store(Enseignant $enseignant, CoursesRequest $request)
    {
        $enseignant->cours()->create(array_merge($request->validated(),
            [
                'enseignant_id' => $enseignant->id
            ]
        ));
        return redirect()->route('teachers.courses', $enseignant)->with('success', 'Cours ajouté avec succès');
    }

    public function edit(Enseignant $enseignant, $cours_id)
    {
        $matieres = Matiere::all();
        $cours = $enseignant->cours()->findOrFail($cours_id);
        $ues = Ue::all();
        return view('pages.enseignants.cours.edit', compact('enseignant', 'cours', 'matieres', 'ues'));
    }

    public function update(Enseignant $enseignant, $id, CoursesRequest $request)
    {
        $cours = $enseignant->cours()->findOrFail($id);
        $cours->update($request->validated());
        return redirect()->route('teachers.courses', $enseignant)->with('success', 'Cours modifié avec succès');
    }

    public function destroy(Enseignant $enseignant, $id)
    {
        $cours = $enseignant->cours()->findOrFail($id);
        $cours->delete();
        return redirect()->route('teachers.courses', $enseignant)->with('success', 'Cours supprimé avec succès');
    }

}
