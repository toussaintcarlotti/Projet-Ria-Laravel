<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'email', 'password', 'profile_id', 'role_id', 'status', 'mail_univ',
        'tel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /***********************
     * RELATIONSHIPS
     ***********************/

    public function enseignant(): HasOne
    {
        return $this->hasOne(Enseignant::class);
    }

    public function etudiant(): HasOne
    {
        return $this->hasOne(Etudiant::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /***********************
     * HELPERS
     ***********************/
    public function profile(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->etudiant ?? $this->enseignant ?? User::find($this->id);
            });
    }

    public function user(): Attribute
    {
        return Attribute::make(
            get: function () {
                return User::find($this->id);
            });
    }

    public function isAdmin(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->role->nom === 'admin',
        );
    }
}
