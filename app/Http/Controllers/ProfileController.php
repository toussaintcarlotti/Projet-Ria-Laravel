<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {

    }

    public function edit($profile)
    {
        $profile = User::findOrFail($profile)->profile;
        $filieres = Filiere::all();
        return view('pages.profiles.edit', compact('profile', 'filieres'));
    }

    public function update($profile)
    {
        $profile = User::findOrFail($profile)->profile;

        $updateProfile = 'App\Actions\Update' . class_basename($profile);

        $updateProfile::run(request()->all(), $profile);

        return redirect()->route('profiles.edit', $profile->user)->with('success', 'Profile modifié avec succès');
    }
}
