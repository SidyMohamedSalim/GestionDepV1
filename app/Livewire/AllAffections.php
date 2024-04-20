<?php

namespace App\Livewire;

use App\Models\Enseignant;
use App\utils\DataGenerator;
use Livewire\Component;
use Livewire\WithPagination;

class AllAffections extends Component
{
    use WithPagination;
    public $perPage = 10;


    public string $categorie = "Equipement";
    public $filterByImprimanteOrOrdinateur = '';

    protected $queryString = [
        'perPage' => ['except' => 10],
        'filterByImprimanteOrOrdinateur' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function changeCategorie($value)
    {
        $this->categorie = $value;
    }

    public function changeImprimanteOrPcValue($value)
    {
        $this->filterByImprimanteOrOrdinateur = $value == $this->filterByImprimanteOrOrdinateur ? '' : $value;
    }

    public function updating($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property

        if ($property === 'page') {
        }
    }


    public function render()
    {
        $query = null;

        $data = collect();

        if ($this->categorie == "Equipement") {
            $query = Enseignant::query()->with(['equipement' => function ($query) {
                $query->with("materiel");
            }]);
        } else {
            $query = Enseignant::query()->with(['fourniture' => function ($query) {
                $query->with("materiel");
            }]);
        }

        $enseignantsAffections = $query->get();

        foreach ($enseignantsAffections as $enseignant) {
            $affectations = $this->categorie == "Equipement" ? $enseignant->equipement : $enseignant->fourniture;

            foreach ($affectations as $equipement) {
                $data->push([
                    'nom' => $enseignant->nom,
                    'prenom' => $enseignant->prenom,
                    'designation' => $equipement->materiel->designation,
                    'quantite' => $equipement->pivot->quantite,
                    'date_affectation' => $equipement->pivot->date_affectation,
                ]);
            }
        }

        if ($this->filterByImprimanteOrOrdinateur != '') {
            $data = $data->filter(function ($item) {
                return $item['designation'] == $this->filterByImprimanteOrOrdinateur;
            });
            $this->resetPage();
        }



        // Create pagination
        $donneesPaginated =  DataGenerator::paginateData($data, $this->perPage);

        return view('livewire.all-affections', [
            "data" => $donneesPaginated,
        ]);
    }
}
