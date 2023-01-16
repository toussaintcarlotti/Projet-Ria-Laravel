<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = ['responsable_id', 'nom', 'description', 'niveau', 'nombre_annee', 'date_debut', 'date_fin'];

    public function responsable(): HasOne
    {
        return $this->hasOne(Enseignant::class, 'responsable_id');
    }

    public function etudiants(): HasMany
    {
        return $this->hasMany(Etudiant::class);
    }
}