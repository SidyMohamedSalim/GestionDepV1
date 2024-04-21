<?php

namespace App\Livewire\Materiels;

use App\Models\Enseignant;
use App\Models\Fourniture;
use App\Models\Equipement;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Stocks extends Component
{

    use WithPagination;

    public string $designation = '';
    public string $categorie = 'Equipement';
    public string $numero_inventaire = '';
    public string $destination = "";

    public string $filterByImprimanteOrOrdinateur = '';


    public string $orderByField = 'created_at';
    public string $orderByDirection = 'DESC';

    protected $queryString = [
        'designation' => ['except' => ""],
        'categorie' => ['except' => ""],
        "numero_inventaire" => ['except' => ""],
        'type' => ['except' => ""],
        'filterByImprimanteOrOrdinateur' => ['except' => ""],
        'orderByField' => ['except' => "created_at"],
        'orderByDirection' => ['except' => "ASC"]
    ];


    public function changeCategorie(string $newCategorie)
    {
        $this->categorie = $newCategorie;
    }

    public function updatedCategorie()
    {
        $this->resetPage();
    }


    public function changeImprimanteOrPcValue($value)
    {
        $this->filterByImprimanteOrOrdinateur = $value == $this->filterByImprimanteOrOrdinateur ? '' : $value;
        $this->resetPage();
    }


    public  function setOrderField(string $fieldname)
    {
        if ($fieldname == $this->orderByField) {
            $this->orderByDirection = $this->orderByDirection == "ASC" ? "DESC" : "ASC";
        } else {
            $this->orderByField = $fieldname;
            $this->reset('orderByDirection');
        }
    }


    #[On('affectationSaved')]
    public function onAffectationSaved()
    {
        $this->numero_inventaire = '12';
        $this->reset('numero_inventaire');
        session()->flash('saveAffectation', 'Le materiel a ete affecte avec succes');
    }

    public function updating($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property

        if ($property === 'designation' || $property == 'type' || $property == 'categorie') {
            $this->resetPage();
        }
    }


    public function render()
    {
        $query = null;

        if ($this->categorie == 'Fourniture') {
            $query = Fourniture::query();
        } else {
            $query = Equipement::query();
        }

        if (!empty($this->designation)) {
            $query = $query->whereHas('materiel', function ($query) {
                $query->where('materiels.designation', "LIKE", "%{$this->designation}%");
            });
        }


        if (!empty($this->numero_inventaire) && $this->categorie == 'Equipement') {
            $query = $query->where('numero_inventaire', "LIKE", "%{$this->numero_inventaire}%");
        }

        if (!empty($this->destination)) {
            $query = $query->where('destination', "LIKE", "%{$this->destination}%");
        }

        if (!empty($this->categorie)) {
            $query = $query->whereHas('materiel', function ($query) {
                $query->where('materiels.categorie', "LIKE", "%{$this->categorie}%");
            });
        }


        if (!empty($this->filterByImprimanteOrOrdinateur) && $this->categorie == 'Equipement') {
            $query = $query->whereHas('materiel', function ($query) {
                $query->where('materiels.designation', "LIKE", "%{$this->filterByImprimanteOrOrdinateur}%");
            });
        }



        return view(
            'livewire.materiels.stocks',
            [
                "equipements" => $query->with('materiel')->where('quantite', ">", "0")->orderBy($this->orderByField, $this->orderByDirection)->paginate(10),
                'enseignants' => Enseignant::all()
            ]
        );
    }
}
