<?php

namespace App\Models;

use App\utils\DataGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'date_demande', 'status'];

    protected $with = ['items'];


    public function getDateDemandeAttribute($value)
    {
        return DataGenerator::FormateDate($value);
    }

    public function items(): HasMany
    {
        return $this->hasMany(ItemDemande::class);
    }
}
