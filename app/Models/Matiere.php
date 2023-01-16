<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Matiere extends Model
{
    protected $fillable = ['libelle_matiere', 'description_matiere'];

    public function cours(): HasOne
    {
        return $this->hasOne(Cours::class);
    }
}
