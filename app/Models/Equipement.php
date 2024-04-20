<?php

namespace App\Models;

use App\utils\DataGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipement extends Model
{
    use HasFactory;


    protected $fillable = [
        'quantite',
        'date_acquisition',
        'numero_inventaire',
        'destination',
        "carateristiques",
        "base_quantite",
        "reference",
        'materiel_id',
        'nbre_restitution'
    ];

    // protected $with = ['materiel'];

    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }

    // public  function affectation(): HasMany
    // {
    //     return $this->hasMany(EnseignantEquipement::class);
    // }

    public  function enseignant(): BelongsToMany
    {
        return $this->belongsToMany(Enseignant::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'signature', 'equipement_id']);
    }

    // public  function bureau(): BelongsToMany
    // {
    //     return $this->belongsToMany(Bureau::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'signature', 'equipement_id']);
    // }

    public function fournitures(): BelongsToMany
    {
        return $this->belongsToMany(Fourniture::class)->withPivot('quantite', 'date_affectation')->wherePivot('quantite', '>', '0');
    }



    public function getDateAcquisitionAttribute($value)
    {
        return DataGenerator::FormateDate($value);
    }
}
