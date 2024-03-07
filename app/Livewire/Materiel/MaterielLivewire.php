<?php

namespace App\Livewire\Materiel;

use App\Models\Materiel;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MaterielLivewire extends Component
{

    use WithPagination;

    public string $type = '';
    public string $categorie = '';

    public string $orderByField = 'created_at';
    public string $orderByDirection = 'DESC';

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




    //Lorsque l'on enregistre une nouvelle acquitision

    #[On('acquisitionSaved')]
    public function onAquisitionSaved(string $materielId)
    {
        $this->reset("categorie");
        session()->flash('saveAcquisition', 'Acquisition fait avec succes');
    }



    public function render()
    {
        $query = Materiel::query();

        if (!empty($this->type)) {
            $query =
                $query->where('type', "LIKE", "%{$this->type}%");
        }

        if (!empty($this->categorie)) {
            $query =
                $query->where('categorie', "LIKE", "%{$this->categorie}%");
        }

        return view(
            'livewire.materiel.materiel-livewire',
            [
                'materiels'
                => $query->orderBy($this->orderByField, $this->orderByDirection)->paginate(10)
            ]
        );
    }
}
