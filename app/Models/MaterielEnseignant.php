<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterielEnseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantite',
        'materiel_id',
        'enseignant_id',
        'date_affectation',
        'signature'
    ];
}
