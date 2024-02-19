<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'designation_id',
        'commentaire',
        'categorie',
        'type',
        'numero_inventaire',
        'date_acquisition',
        'reference_id'
    ];


    public function reference(): BelongsTo
    {
        return $this->belongsTo(Reference::class);
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }
}
