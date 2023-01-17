<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
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
    }

    public function store(Request $request)
    {
    }

    public function show(Filiere $filiere)
    {
    }

    public function edit(Filiere $filiere)
    {
    }

    public function update(Request $request, Filiere $filiere)
    {
    }

    public function destroy(Filiere $filiere)
    {
    }
}
