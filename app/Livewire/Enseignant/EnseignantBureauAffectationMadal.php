<?php

namespace App\Livewire\Enseignant;

use App\Models\Bureau;
use App\Models\Enseignant;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EnseignantBureauAffectationMadal extends Component
{

    public Enseignant $enseignant;

    public function render()
    {
        return view('livewire.enseignant.enseignant-bureau-affectation-madal',  ['bureaux' => Bureau::all()]);
    }
}
