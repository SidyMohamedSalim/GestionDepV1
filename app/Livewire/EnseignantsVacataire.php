<?php

namespace App\Livewire;

use App\Models\EnseignantVacataire;
use Livewire\Component;
use Livewire\WithPagination;

class EnseignantsVacataire extends Component
{

    use WithPagination;
    public function render()
    {
        return view('livewire.enseignants-vacataire', [
            'enseignants' => EnseignantVacataire::paginate(10)
        ]);
    }
}
