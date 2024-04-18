<?php

namespace App\Livewire;

use App\Models\Enseignant;
use Livewire\Component;

class ShowMaterielEnseignantBureau extends Component
{
    public function render()
    {
        return view('livewire.show-materiel-enseignant-bureau', [
            "enseignants" => Enseignant::with('bureau', 'equipement', 'fourniture')->orderBy('created_at', 'desc')->paginate(5)
        ]);
    }
}
