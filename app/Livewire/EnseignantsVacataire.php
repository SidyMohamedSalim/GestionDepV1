<?php

namespace App\Livewire;

use App\Models\EnseignantVacataire;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy()]
class EnseignantsVacataire extends Component
{
    use WithPagination;

    //lazy loading
    public function placeholder()
    {
        return view('components.loader');
    }


    public function render()
    {
        return view('livewire.enseignants-vacataire', [
            'enseignants' => EnseignantVacataire::paginate(10)
        ]);
    }
}
