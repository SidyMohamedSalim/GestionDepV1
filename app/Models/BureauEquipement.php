<?php

namespace App\Models;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BureauEquipement extends Model
{

    protected $fillable = [
        'quantite',
        'materiel_id',
        'enseignant_id',
        'date_affectation',
        'signature'
    ];

    public function bureau(): BelongsTo
    {
        return $this->belongsTo(Bureau::class);
    }


    public function acquisition(): BelongsTo
    {
        return $this->belongsTo(Equipement::class);
    }

    use HasFactory;
}
