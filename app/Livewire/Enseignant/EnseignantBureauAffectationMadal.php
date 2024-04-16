<?php

namespace App\Livewire\Enseignant;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EnseignantBureauAffectationMadal extends Component
{

    public Enseignant $enseignant;
    public Collection $bureaux;

    public $showModal = false;


    public function render()
    {
        return view('livewire.enseignant.enseignant-bureau-affectation-madal');
    }
}
