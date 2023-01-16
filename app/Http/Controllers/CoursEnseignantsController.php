<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoursesRequest;
use App\Models\Enseignant;
use App\Models\Matiere;

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
        return view('pages.enseignants.cours.create', compact('enseignant', 'matieres'));
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

    public function edit(Enseignant $enseignant, $id)
    {
        $matieres = Matiere::all();
        $cours = $enseignant->cours()->findOrFail($id);
        return view('pages.enseignants.cours.edit', compact('enseignant', 'cours', 'matieres'));
    }

}
