<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnseignantRequest extends FormRequest
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
            'responsabilite_enseignant' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
