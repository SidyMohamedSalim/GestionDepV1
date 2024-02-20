<?php

namespace App\Livewire\Materiel;

use App\Models\Equipement;
use App\Models\Fourniture;
use App\Models\Materiel;
use Livewire\Component;
use Livewire\WithPagination;

class MaterielLivewire extends Component
{

    use WithPagination;

    public string $type = 'Bureau';
    public string $categorie = '';
    protected $query;

    public string $orderByField = 'created_at';
    public string $orderByDirection = 'ASC';

    protected $queryString = [
        'type' => ['except' => ""],
        'categorie' => ['except' => ""],
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

    public function mount()
    {
        if ($this->categorie == 'Equipement') {
            $this->query = Equipement::query();
        } else {
            $this->query = Fourniture::query();
        }

        if (!empty($this->type)) {
            $this->query =
                $this->query->where('type', "LIKE", "%{$this->type}%");
        }
    }

    public function render()
    {




        return view(
            'livewire.materiel.materiel-livewire',
            [
                'materiels'
                => $this->query->with('materiel')->orderBy($this->orderByField, $this->orderByDirection)->paginate(10)
            ]
        );
    }
}