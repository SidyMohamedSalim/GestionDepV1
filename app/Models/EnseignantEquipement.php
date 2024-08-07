<?php

namespace App\Models;

use App\Models\Equipement;
use App\utils\DataGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnseignantEquipement extends Model
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

    public function acquisition(): BelongsTo
    {
        return $this->belongsTo(Equipement::class);
    }

    public function getDateAffectationAttribute($value)
    {
        return DataGenerator::FormateDate($value);
    }
}
