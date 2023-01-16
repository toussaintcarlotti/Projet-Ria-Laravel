<?php

namespace App\Actions;

use App\Http\Requests\EtudiantRequest;
use App\Http\Requests\UserRequest;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\Action;

class UpdateEtudiant extends Action
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function handle(array $input, Etudiant $etudiant)
    {
        Validator::make($input, (new EtudiantRequest())->rules())->validated();

        UpdateUser::run($input, $etudiant->user);

        $etudiant->update([
            'filiere_id' => $input['filiere_id'],
            'diplome_etudiant' => $input['diplome_etudiant'],
        ]);

        return $etudiant;
    }
}
