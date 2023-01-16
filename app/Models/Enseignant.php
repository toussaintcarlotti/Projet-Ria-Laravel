<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'filiere_id', 'responsabilite_enseignant'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function filiereResponsable(): BelongsTo
    {
        return $this->belongsTo(Filiere::class, 'responsable_filiere_id');
    }

    public function cours(): HasMany
    {
        return $this->hasMany(Cours::class);
    }

}
