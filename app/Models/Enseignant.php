<?php

namespace App\Models;

use App\Models\Materiels\MaterielAcquisition;
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

    public  function acquisition(): BelongsToMany
    {
        return $this->belongsToMany(MaterielAcquisition::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'signature', 'materiel_acquisition_id']);
    }



    public  function affectation(): HasMany
    {
        return $this->hasMany(EnseignantMaterielAcquisition::class);
    }

    public function restitution(): HasMany
    {
        return $this->hasMany(MaterielRestitution::class);
    }
}
