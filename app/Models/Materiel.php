<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'designation',
    ];


    public function equipement(): HasMany
    {
        return $this->hasMany(Equipement::class);
    }


    public function fourniture(): HasMany
    {
        return $this->hasMany(Fourniture::class);
    }
}
