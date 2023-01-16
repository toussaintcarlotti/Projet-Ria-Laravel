<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EtudiantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'status' => ['sometimes', 'nullable'],
            'mail_univ' => ['sometimes', 'nullable', 'email'],
            'tel' => ['sometimes', 'nullable'],
            'filiere_id' => ['nullable', 'integer'],
            'diplome_etudiant' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
