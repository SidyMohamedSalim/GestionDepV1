<?php

namespace App\Models;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

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

    protected $with = ['fourniture', 'equipement'];

    public function scopePc(Builder $query): void
    {
        $query->where('designation', 'LIKE', "%pc%")->where('categorie', 'LIKE', "equipement");
    }

    public function scopeImprimante(Builder $query): void
    {
        $query->where('designation', 'LIKE', "%imprimante%")->where('categorie', 'LIKE', "equipement");
    }

    public function fourniture(): HasMany
    {
        return $this->hasMany(Fourniture::class);
    }

    public function equipement(): HasMany
    {
        return $this->hasMany(Equipement::class);
    }
}
