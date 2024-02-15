<?php

namespace App\Livewire;

use App\Models\Bureau;
use App\Models\Enseignant;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy()]
class BureauLivewire extends Component
{

    use WithPagination;


    public string $numero = '';
    public string $designation = '';

    public string $orderByField = 'created_at';
    public string $orderByDirection = 'ASC';

    protected $queryString = [
        'numero' => ['except' => ""],
        'designation' => ['except' => ""],
        'orderByField' => ['except' => "created_at"],
        'orderByDirection' => ['except' => "ASC"]
    ];


    //lazy loading
    public function placeholder()
    {
        return view('components.loader');
    }

    public function updating($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property

        if ($property === 'numero' || $property == 'designation') {
            $this->resetPage();
        }
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


    public function render()
    {
        $query = Bureau::query();


        if (!empty($this->numero)) {
            $query = $query->where('numero_bureau', "LIKE", "%{$this->numero}%");
        }

        if (!empty($this->designation)) {
            $query = $query->where('designation', "LIKE", "%{$this->designation}%");
        }


        return view('livewire.bureau-livewire', [
            'bureaux' =>
            $query->with('enseignant')->orderBy($this->orderByField, $this->orderByDirection)->paginate(10),
            'enseignants' => Enseignant::all()
        ]);
    }
}
