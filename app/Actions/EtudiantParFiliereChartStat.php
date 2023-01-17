<?php

namespace App\Actions;

use App\Models\Filiere;
use Lorisleiva\Actions\Action;

class EtudiantParFiliereChartStat extends Action
{

    public function handle()
    {
        $filieres = Filiere::all()->pluck('nom');
        $nbEtudiants = Filiere::all()->pluck('etudiants')->map(function ($etudiants) {
            return $etudiants->count();
        });
        $nbTotalEtudiants = $nbEtudiants->sum();

        return [
            'labels' => $filieres,
            'data' => $nbEtudiants,
            'totalEtudiant' => $nbTotalEtudiants,
        ];
    }
}
