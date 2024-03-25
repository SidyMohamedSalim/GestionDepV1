<?php

namespace App\Models\Materiels;

use App\Models\Bureau;
use App\Models\Enseignant;
use App\Models\EnseignantMaterielAcquisition;
use App\Models\Materiel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MaterielAcquisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'date_acquisition',
        'numero_inventaire',
        'destination',
        "carateristiques",
        "base_quantite",
        'materiel_id',
        'nbre_restitution'
    ];

    protected $with = ['materiel', 'enseignant', 'composants'];

    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }

    public  function affectation(): HasMany
    {
        return $this->hasMany(EnseignantMaterielAcquisition::class);
    }

    public  function enseignant(): BelongsToMany
    {
        return $this->belongsToMany(Enseignant::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'signature', 'materiel_acquisition_id']);
    }

    public  function bureau(): BelongsToMany
    {
        return $this->belongsToMany(Bureau::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'signature', 'materiel_acquisition_id']);
    }

    // un materiel inventoriee peut avoir des composants materiels
    public function composants(): HasMany
    {
        return $this->hasMany(MaterielAcquisition::class);
    }

    // un materiel non inventoriee peut avoir comment parent un  materiel inventoriee
    public function parentMateriel(): BelongsTo
    {
        return $this->belongsTo(MaterielAcquisition::class);
    }
}
