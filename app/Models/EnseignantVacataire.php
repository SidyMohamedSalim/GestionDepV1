<?php

namespace App\Models;

use App\utils\DataGenerator;
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
        return DataGenerator::FormateDate($value);
    }
    public function getDateFinAttribute($value)
    {
        return DataGenerator::FormateDate($value);
    }
}
