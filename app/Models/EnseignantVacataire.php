<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnseignantVacataire extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'active',
        'date_debut',
        'date_fin',
    ];

    public function getDateDebutAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->translatedFormat('j F Y');
    }
    public function getDateFinAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->translatedFormat('j F Y');
    }
}
