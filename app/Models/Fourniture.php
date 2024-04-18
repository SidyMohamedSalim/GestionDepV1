<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fourniture extends Model
{
    use HasFactory;


    protected $fillable = [
        'quantite',
        'date_acquisition',
        'destination',
        "carateristiques",
        "reference",
        "base_quantite",
        'materiel_id',
    ];

    // protected $with = ['materiel'];


    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }


    // // un materiel non inventoriee peut avoir comment parent un  materiel inventoriee
    // public function parentMateriel(): BelongsTo
    // {
    //     return $this->belongsTo(Equipement::class);
    // }

    // public  function affectation(): HasMany
    // {
    //     return $this->hasMany(EnseignantFourniture::class);
    // }

    public  function enseignant(): BelongsToMany
    {
        return $this->belongsToMany(Enseignant::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'fourniture_id']);
    }

    public function getDateAcquisitionAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->translatedFormat('j F Y');
    }
}
