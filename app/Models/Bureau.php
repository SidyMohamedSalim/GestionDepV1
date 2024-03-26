<?php

namespace App\Models;

use App\Models\Equipement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bureau extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_bureau',
        'designation',
        'capacite',
        'date_acquisition'
    ];

    public function enseignant(): BelongsToMany
    {
        return $this->belongsToMany(Enseignant::class);
    }




    public  function acquisition(): BelongsToMany
    {
        return $this->belongsToMany(Equipement::class)->withTimestamps()->withPivot(['id', 'quantite', 'date_affectation', 'signature', 'equipement_id']);
    }
}
