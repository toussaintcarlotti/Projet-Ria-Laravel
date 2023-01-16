<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        $cours = Cours::paginate(10);
        return view('pages.cours.index', compact('cours'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Cours $cours)
    {
    }

    public function edit(Cours $cours)
    {
    }

    public function update(Request $request, Cours $cours)
    {
    }

    public function destroy(Cours $cours)
    {
    }
}
