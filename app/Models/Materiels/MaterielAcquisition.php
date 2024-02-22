<?php

namespace App\Models\Materiels;

use App\Models\Materiel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterielAcquisition extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite',
        'date_acquisition',
        'materiel_id'
    ];

    public function materiel(): BelongsTo
    {
        return $this->belongsTo(Materiel::class);
    }
}
