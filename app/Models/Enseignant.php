<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'filiere_id', 'responsabilite_enseignant'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function filiereResponsable(): HasOne
    {
        return $this->hasOne(Filiere::class, 'responsable_id');
    }

    public function cours(): HasMany
    {
        return $this->hasMany(Cours::class);
    }

}
