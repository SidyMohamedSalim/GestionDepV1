<?php

namespace App\Models;

use App\Models\Materiels\MaterielAcquisition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterielRestitution extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        "date_restitution",
        'signature',
        'enseignant_id',
        'materiel_acquisition_id'
    ];

    protected $with = ['acquisition'];

    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function acquisition(): BelongsTo
    {
        return $this->belongsTo(MaterielAcquisition::class);
    }
}
