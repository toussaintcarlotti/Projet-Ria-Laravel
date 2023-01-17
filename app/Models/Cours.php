<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = ['enseignant_id', 'ue_id', 'matiere_id', 'horaire_debut', 'horaire_fin', 'type_cours'];

    public function matiere(): BelongsTo
    {
        return $this->belongsTo(Matiere::class);
    }

    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function ue(): BelongsTo
    {
        return $this->belongsTo(Ue::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function notesEtudiant(Etudiant $etudiant)
    {
        return $this->notes->where('etudiant_id', $etudiant->id);
    }

    public function edts(): HasMany
    {
        return $this->hasMany(Edt::class);
    }

}
