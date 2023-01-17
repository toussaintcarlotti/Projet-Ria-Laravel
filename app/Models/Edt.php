<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Edt extends Model
{
    use HasFactory;

    protected $fillable = ['cours_id', 'date_debut', 'date_fin', 'information'];

    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cours::class);
    }
}
