<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemDemande extends Model
{
    use HasFactory;

    protected $fillable = ['demande_id', 'designation', 'quantite', 'prix_unitaire', 'description'];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }

    public function total()
    {
        return $this->quantite * $this->prix_unitaire;
    }
}
