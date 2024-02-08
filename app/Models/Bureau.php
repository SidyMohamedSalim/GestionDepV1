<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
