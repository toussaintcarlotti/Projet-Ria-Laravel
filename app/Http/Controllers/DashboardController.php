<?php

namespace App\Http\Controllers;

use App\Actions\EtudiantParFiliereChartStat;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $etudiantFiliereStats = EtudiantParFiliereChartStat::run();
        return view('dashboard', compact('etudiantFiliereStats'));
    }
}
