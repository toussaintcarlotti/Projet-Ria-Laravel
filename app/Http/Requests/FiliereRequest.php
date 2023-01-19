<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class FiliereRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'responsable_id' => ['required', 'exists:enseignants,id'],
            'nom' => ['required'],
            'description' => ['nullable'],
            'niveau' => ['required'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $date_debut = $this->date_debut ? Carbon::createFromFormat('d/m/Y', $this->date_debut)->format('Y-m-d') : null;
        $date_fin = $this->date_fin ? Carbon::createFromFormat('d/m/Y', $this->date_fin)->format('Y-m-d') : null;
        $this->merge([
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
        ]);
    }

    public function attributes(): array
    {
        return [
            'responsable_id' => 'responsable',
            'nom' => 'nom',
            'description' => 'description',
            'niveau' => 'niveau',
            'date_debut' => 'date de début',
            'date_fin' => 'date de fin',
            'ues_id' => 'ues',
        ];
    }

    public function messages(): array
    {
        return [
            'ues_id.required' => 'Vous devez sélectionner au moins une UE',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
