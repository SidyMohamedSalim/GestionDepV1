<?php

namespace App\Models;

use App\Models\Equipement;
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
        'bureau_id',
        'equipement_id',
        'designation',
        'numero_inventaire'
    ];

    protected $with = ['acquisition'];

    public function enseignant(): BelongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function bureau(): BelongsTo
    {
        return $this->belongsTo(Bureau::class);
    }

    public function acquisition(): BelongsTo
    {
        return $this->belongsTo(Equipement::class);
    }
}
