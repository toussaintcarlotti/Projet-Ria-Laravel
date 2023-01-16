<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ue_id' => ['nullable', 'integer'],
            'matiere_id' => ['nullable', 'exists:matieres,id'],
            'horaire_debut' => ['required', 'date_format:H:i'],
            'horaire_fin' => ['required', 'date_format:H:i'],
            'type_cours' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
