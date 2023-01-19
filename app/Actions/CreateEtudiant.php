<?php

namespace App\Actions;

use App\Http\Requests\EtudiantRequest;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Action;

class CreateEtudiant extends Action
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function handle($input): Etudiant
    {
        $user = CreateUser::run(array_merge($input, ['role_id' => 4]));

        $etudiant = Etudiant::create([
            'user_id' => $user->id,
            'filiere_id' => $input['filiere_id'],
            'diplome_etudiant' => $input['diplome_etudiant'],
        ]);

        $user->update([
            'profile_id' => $etudiant->id,
        ]);

        return $etudiant;
    }
}
