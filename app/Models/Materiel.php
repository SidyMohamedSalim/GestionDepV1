<?php

namespace App\Models;

use App\Models\Materiels\MaterielAcquisition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'designation',
        'commentaire',
        'type',
        'categorie',
        'reference',
    ];


    public function acquisition(): HasMany
    {
        return $this->hasMany(MaterielAcquisition::class);
    }
}
