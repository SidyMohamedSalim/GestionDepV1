<?php

namespace App\Livewire;

use App\Models\Enseignant;
use Livewire\Component;
use Livewire\WithPagination;

class AllAffections extends Component
{

    use WithPagination;

    public string $categorie = "Equipement";
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
        $query = Enseignant::query()->with($this->categorie == "Equipement" ? 'equipement' : 'fourniture');


        return view('livewire.all-affections', [
            "enseignantsAffectations" => $query->paginate(10)
        ]);
    }
}
