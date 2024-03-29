<?php

namespace App\Models;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'active',
        'grade',
        'daterecrutement',
    ];


    public  function bureau(): BelongsToMany
    {
        return $this->belongsToMany(Bureau::class);
    }

    public  function equipement(): BelongsToMany
    {
        return $this->belongsToMany(Equipement::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'signature', 'equipement_id']);
    }

    public  function fourniture(): BelongsToMany
    {
        return $this->belongsToMany(Fourniture::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'fourniture_id']);
    }

    public function restitution(): HasMany
    {
        return $this->hasMany(MaterielRestitution::class);
    }
}
