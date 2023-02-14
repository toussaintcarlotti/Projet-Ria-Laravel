<?php

namespace App\Actions;

use App\Models\Etudiant;
use App\Models\Filiere;
use Lorisleiva\Actions\Action;

class EtudiantParFiliereChartStat extends Action
{

    public function handle()
    {

        $filieres = Filiere::withCount('etudiants')->get();

        return [
            'labels' => $filieres->pluck('nom')->toArray(),
            'data' => $filieres->pluck('etudiants_count')->toArray(),
            'totalEtudiant' => $filieres->sum('etudiants_count')
        ];
    }
}
