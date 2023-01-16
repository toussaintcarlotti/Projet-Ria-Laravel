<?php

namespace App\Actions\Fortify;

use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $user = Validator::make($input, [
            'profile' => ['required'],
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'status' => ['sometimes', 'nullable'],
            'mail_univ' => ['sometimes', 'nullable', 'email'],
            'tel' => ['sometimes', 'nullable'],
        ])->validate();

        if ($user['profile'] == 'etudiant'){
            $user['role_id'] = 4;
        }elseif ($user['profile'] == 'enseignant') {
            $user['role_id'] = 2;
        }

        $user['filiere_id'] = 4;
        $user['diplome_etudiant'] = 'aucun';
        $user['responsabilite_enseignant'] = 'aucun';

        $newUser = User::create([
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'role_id' => $user['role_id'],
        ]);
        if ($user['profile'] == 'etudiant'){
            $profile = Etudiant::create([
                'user_id' => $newUser->id,
                'filiere_id' => $user['filiere_id'],
                'diplome_etudiant' => $user['diplome_etudiant'],
            ]);
        }elseif ($user['profile'] == 'enseignant') {
            $profile = Enseignant::create([
                'user_id' => $newUser->id,
                'filiere_id' => $user['filiere_id'],
                'responsabilite_enseignant' => $user['responsabilite_enseignant'],
            ]);
        }
        $newUser->profile_id = $profile->id;

        return $newUser;
    }
}
