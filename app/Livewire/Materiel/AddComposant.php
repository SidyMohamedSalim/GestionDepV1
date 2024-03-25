<?php

namespace App\Livewire\Materiel;

use App\Models\Materiels\MaterielAcquisition;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AddComposant extends Component
{

    public MaterielAcquisition $acquisition;

    public Collection $composants;

    public function render()
    {
        return view('livewire.materiel.add-composant');
    }
}
