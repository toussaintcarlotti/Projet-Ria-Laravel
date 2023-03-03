<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Collection\Collection;

class Edt extends Model
{
    use HasFactory;

    protected $fillable = ['cours_id', 'date_debut', 'date_fin', 'information'];

    protected $dates = ['date_debut', 'date_fin'];

    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cours::class);
    }


    /******************************
     *** SCOPES
     ******************************/
    public function scopeFiliere($q, Filiere $filiere): void
    {
        $q->whereHas('cours', function ($q) use ($filiere) {
            $q->whereHas('ue', function ($q) use ($filiere) {
                $q->where('filiere_id', $filiere->id);
            });
        });
    }

    public function scopeEnseignant($q, Enseignant $enseignant): void
    {
        $q->whereHas('cours', function ($q) use ($enseignant) {
            $q->where('enseignant_id', $enseignant->id);
        });
    }

}
