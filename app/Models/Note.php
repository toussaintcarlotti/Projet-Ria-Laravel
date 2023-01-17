<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['etudiant_id', 'cours_id', 'nom_examen', 'note'];

    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cours::class);
    }

    public function getNotesEtudiantAttribute(Etudiant $etudiant)
    {
        return $this->notes->where('etudiant_id', $etudiant->id)->first();
    }
}
