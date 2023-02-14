<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    /******************************
     *** HELPERS
     ******************************/
    public function getFormatedEdtAttribute(): \Illuminate\Support\Collection
    {
        return format_edt(Edt::filiere($this)->get());
    }

    public function edt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Edt::join('cours', 'cours.id', '=', 'edts.cours_id')
                ->join('ues', 'ues.id', '=', 'cours.ue_id')
                ->where('ues.filiere_id', $this->id)
                ->get(),
        );
    }
}
