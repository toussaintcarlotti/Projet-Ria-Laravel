<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = ['responsable_id', 'nom', 'description', 'niveau', 'nombre_annee', 'date_debut', 'date_fin'];

    public function responsable(): BelongsTo
    {
        return $this->belongsTo(Enseignant::class, 'responsable_id');
    }

    public function etudiants(): HasMany
    {
        return $this->hasMany(Etudiant::class);
    }

    public function ues(): HasMany
    {
        return $this->hasMany(Ue::class);
    }

    public function edt(): Attribute
    {
        return Attribute::make(
            get: function () {
                return Edt::whereIn('cours_id', $this->ues->map(function ($ue) {
                    return $ue->cours->pluck('id');
                })->flatten())->get();
            },
            set: fn($value) => $value,
        );
    }
}
