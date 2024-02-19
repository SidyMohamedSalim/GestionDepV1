<?php

namespace App\Livewire\Materiel;

use Livewire\Component;

class MaterielLivewire extends Component
{
    public string $type = 'equipement';

    public function render()
    {
        return view('livewire.materiel.materiel-livewire');
    }
}
