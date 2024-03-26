<?php

namespace App\Models;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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



    protected $with = ['fourniture', 'equipement'];


    public function fourniture(): HasMany
    {
        return $this->hasMany(Fourniture::class);
    }

    public function equipement(): HasMany
    {
        return $this->hasMany(Equipement::class);
    }
}
