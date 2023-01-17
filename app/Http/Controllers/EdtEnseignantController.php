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
        $cours_id = $enseignant->cours->pluck('id');
        $edts = Edt::whereIn('cours_id', $cours_id)->get();
        foreach ($edts as $edt) {
            $edt['start'] = Carbon::parse($edt->date_debut)->format('Y-m-d') . 'T' . Carbon::parse($edt->date_debut)->format('H:i:s');
            $edt['end'] = Carbon::parse($edt->date_fin)->format('Y-m-d') . 'T' . Carbon::parse($edt->date_fin)->format('H:i:s');;
            $edt['title'] = $edt->cours->matiere->libelle_matiere;
            $edt['description'] = $edt->information;
        }

        return view('pages.enseignants.edts.show', compact('edts', 'enseignant'));
    }
}