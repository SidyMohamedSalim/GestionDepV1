<?php

namespace App\Livewire;

use App\Models\Enseignant;
use App\Models\Materiel;
use Livewire\Component;

class AllAffections extends Component
{

    public string $categorie = "Fourniture";
    public $filterByImprimanteOrOrdinateur = '';

    public function changeCategorie($value)
    {
        $this->categorie = $value;
    }


    public function changeImprimanteOrPcValue($value)
    {
        $this->filterByImprimanteOrOrdinateur = $value == $this->filterByImprimanteOrOrdinateur ? '' : $value;
    }

    public function render()
    {
        return view('livewire.all-affections', [
            "enseignantsAffectations" => Enseignant::with('equipement', 'fourniture')->get()
        ]);
    }
}
