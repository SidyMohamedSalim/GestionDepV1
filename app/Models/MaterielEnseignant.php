<?php

namespace App\Models;

use App\Models\Materiels\MaterielAcquisition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterielEnseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantite',
        'materiel_id',
        'enseignant_id',
        'date_affectation',
        'signature'
    ];

    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }

    public function acquisition(): BelongsTo
    {
        return $this->belongsTo(MaterielAcquisition::class);
    }
}
