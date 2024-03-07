<?php

namespace App\Models\Materiels;

use App\Models\Enseignant;
use App\Models\EnseignantMateriel;
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
        'materiel_id'
    ];

    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }

    public  function affectation(): HasMany
    {
        return $this->hasMany(EnseignantMateriel::class);
    }

    public  function enseignant(): BelongsToMany
    {
        return $this->belongsToMany(Enseignant::class)->withTimestamps()->withPivot(['quantite', 'date_affectation', 'signature']);
    }
}
