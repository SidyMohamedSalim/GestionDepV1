<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'designation',
        'commentaire',
        'type',
        'categorie',
        'reference',
    ];

    public  function affectation(): HasMany
    {
        return $this->hasMany(MaterielEnseignant::class);
    }

    public  function enseignant(): BelongsToMany
    {
        return $this->belongsToMany(Enseignant::class);
    }
}
