<?php

namespace App\Livewire\Materiel;

use App\Models\Materiel;
use Livewire\Component;
use Livewire\WithPagination;

class MaterielLivewire extends Component
{

    use WithPagination;

    public string $type = 'Bureau';
    public string $categorie = 'Fourniture';

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

    public function render()
    {
        $query = Materiel::query();

        if (!empty($this->type)) {
            $query = $query->where('type', "LIKE", "%{$this->type}%");
        }

        if (!empty($this->categorie)) {
            $query = $query->where('categorie', "LIKE", "%{$this->categorie}%");
        }


        return view(
            'livewire.materiel.materiel-livewire',
            [
                'materiels' => $query->with(['designation', 'reference'])->orderBy($this->orderByField, $this->orderByDirection)->paginate(10)
            ]
        );
    }
}
