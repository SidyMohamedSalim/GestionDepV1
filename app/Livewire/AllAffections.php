<?php

namespace App\Livewire;

use App\Models\Enseignant;
use App\Models\Materiel;
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
        $query = Enseignant::query();
        if ($this->categorie == "Equipement") {
            $query = $query->with('equipement');
        } else {
            $query = $query->with('fourniture');
        }

        return view('livewire.all-affections', [
            "enseignantsAffectations" => $query->paginate(10)
        ]);
    }
}
