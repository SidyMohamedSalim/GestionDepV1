<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipement extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'commentaire',
        'type',
        'numero_inventaire',
        'date_acquisition',
        'reference_id',
        'materiel_id'
    ];

    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }

    public function reference(): BelongsTo
    {
        return $this->belongsTo(Reference::class);
    }
}
