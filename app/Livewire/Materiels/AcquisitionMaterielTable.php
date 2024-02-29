<?php

namespace App\Livewire\Materiels;

use App\Models\Materiels\MaterielAcquisition;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AcquisitionMaterielTable extends Component
{

    use WithPagination;

    public string $designation = '';
    public string $categorie = '';
    public string $type = "";

    public string $orderByField = 'created_at';
    public string $orderByDirection = 'DESC';

    protected $queryString = [
        'designation' => ['except' => ""],
        'categorie' => ['except' => ""],
        'type' => ['except' => ""],
        'orderByField' => ['except' => "created_at"],
        'orderByDirection' => ['except' => "ASC"]
    ];

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
        $this->reset('type');
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

        $query = MaterielAcquisition::query();



        if (!empty($this->designation)) {
            $query = $query->whereHas('materiel', function ($query) {
                $query->where('materiels.designation', "LIKE", "%{$this->designation}%");
            });
        }

        if (!empty($this->categorie)) {
            $query = $query->whereHas('materiel', function ($query) {
                $query->where('materiels.categorie', "LIKE", "%{$this->categorie}%");
            });
        }

        if (!empty($this->type)) {
            $query = $query->whereHas('materiel', function ($query) {
                $query->where('materiels.type', "LIKE", "%{$this->type}%");
            });
        }


        return view(
            'livewire.materiels.acquisition-materiel-table',
            [
                "materiel_acquisitions" => $query->with('materiel')->where('quantite', ">", "0")->orderBy($this->orderByField, $this->orderByDirection)->paginate(10)
            ]
        );
    }
}
