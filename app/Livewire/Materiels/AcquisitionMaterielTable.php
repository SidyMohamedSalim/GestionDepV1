<?php

namespace App\Livewire\Materiels;

use App\Models\Materiels\MaterielAcquisition;
use Livewire\Component;
use Livewire\WithPagination;

class AcquisitionMaterielTable extends Component
{

    use WithPagination;


    public string $orderByField = 'created_at';
    public string $orderByDirection = 'ASC';

    protected $queryString = [
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




    public function render()
    {

        $query = MaterielAcquisition::query();
        return view(
            'livewire.materiels.acquisition-materiel-table',
            [
                "materiel_acquisitions" => $query->with('materiel')->orderBy($this->orderByField, $this->orderByDirection)->paginate(10)
            ]
        );
    }
}
