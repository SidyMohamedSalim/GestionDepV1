<?php

namespace App\Livewire;

use App\Models\Bureau;
use App\Models\Enseignant;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy()]
class EnseignantLivewire extends Component
{


    use WithPagination;

    public string $nom = '';
    public string $prenom = '';
    public string $email = "";

    public string $orderByField = 'created_at';
    public string $orderByDirection = 'ASC';

    protected $queryString = [
        'nom' => ['except' => ""],
        'prenom' => ['except' => ""],
        'email' => ['except' => ""],
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

    public function updating($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property

        if ($property === 'nom' || $property == 'prenom' || $property == 'email') {
            $this->resetPage();
        }
    }

    //lazy loading
    public function placeholder()
    {
        return view('components.loader');
    }


    public function render()
    {
        $query = Enseignant::query();

        if (!empty($this->nom)) {
            $query = $query->where('nom', "LIKE", "%{$this->nom}%");
        }

        if (!empty($this->prenom)) {
            $query = $query->where('prenom', "LIKE", "%{$this->prenom}%");
        }

        if (!empty($this->email)) {
            $query = $query->where('email', "LIKE", "%{$this->email}%");
        }

        return view(
            'livewire.enseignant-livewire',
            [
                'enseignants' => $query->with('bureau')->orderBy($this->orderByField, $this->orderByDirection)->paginate(10),
                'bureaux' => Bureau::all()
            ]
        );
    }
}