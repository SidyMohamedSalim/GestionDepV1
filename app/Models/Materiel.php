<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
