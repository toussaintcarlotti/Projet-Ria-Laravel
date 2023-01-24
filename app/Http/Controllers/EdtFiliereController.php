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
        $cours_id = $filiere->ues->map(function ($ue) {
            return $ue->cours->pluck('id');
        })->flatten();
        $edts = Edt::whereIn('cours_id', $cours_id)->get();
        foreach ($edts as $edt) {
            $edt['start'] = Carbon::parse($edt->date_debut)->format('Y-m-d') . 'T' . Carbon::parse($edt->date_debut)->format('H:i:s');
            $edt['end'] = Carbon::parse($edt->date_fin)->format('Y-m-d') . 'T' . Carbon::parse($edt->date_fin)->format('H:i:s');;
            $edt['title'] = $edt->cours->matiere->libelle_matiere;
            $edt['description'] = $edt->information;
        }

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
