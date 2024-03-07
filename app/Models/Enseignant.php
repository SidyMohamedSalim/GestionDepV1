<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'active',
        'grade',
        'daterecrutement',
    ];

    public  function bureau(): BelongsToMany
    {
        return $this->belongsToMany(Bureau::class);
    }

    public  function materiel(): BelongsToMany
    {
        return $this->belongsToMany(Materiel::class)->withTimestamps()->withPivot(['quantite', 'date_affectation', 'signature', 'materiel_acquisition_id']);
    }
    public  function affectation(): HasMany
    {
        return $this->hasMany(EnseignantMateriel::class);
    }
}
