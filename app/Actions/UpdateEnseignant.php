<?php

namespace App\Actions;

use App\Http\Requests\EnseignantRequest;
use App\Http\Requests\EtudiantRequest;
use App\Http\Requests\UserRequest;
use App\Models\Enseignant;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\Action;

class UpdateEnseignant extends Action
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function handle(array $input, Enseignant $enseignant)
    {
        Validator::make($input, (new EnseignantRequest())->rules())->validated();

        UpdateUser::run($input, $enseignant->user);

        $enseignant->update([
            'responsabilite_enseignant' => $input['responsabilite_enseignant'],
        ]);

        return $enseignant;
    }
}
