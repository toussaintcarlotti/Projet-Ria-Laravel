<?php

namespace App\Actions;

use App\Models\Enseignant;
use Lorisleiva\Actions\Action;

class CreateEnseignant extends Action
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function handle(array $input)
    {
        $user = CreateUser::run(array_merge($input));

        $enseignant = Enseignant::create([
            'user_id' => $user->id,
            'responsabilite_enseignant' => $input['responsabilite_enseignant'],
        ]);

        return $enseignant;
    }
}
