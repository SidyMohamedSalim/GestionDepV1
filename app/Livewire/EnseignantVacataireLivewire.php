<?php

namespace App\Livewire;

use App\Models\EnseignantVacataire;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy()]
class EnseignantVacataireLivewire extends Component
{

    use WithPagination;

    public string $nom = '';
    public string $email = "";

    public string $orderByField = 'created_at';
    public string $orderByDirection = 'ASC';

    protected $queryString = [
        'nom' => ['except' => ""],
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

    //lazy loading
    public function placeholder()
    {
        return view('components.loader');
    }




    public function updating($property, $value)
    {
        // $property: The name of the current property being updated
        // $value: The value about to be set to the property

        if ($property == 'nom' || $property == 'email') {
            $this->resetPage();
        }
    }



    public function render()
    {
        $query = EnseignantVacataire::query();
        if (!empty($this->nom)) {
            $query = $query->where('nom', "LIKE", "%{$this->nom}%");
        }

        if (!empty($this->email)) {
            $query = $query->where('email', "LIKE", "%{$this->email}%");
        }

        return view('livewire.enseignant-vacataire-livewire', [
            'enseignants'
            => $query->orderBy($this->orderByField, $this->orderByDirection)->paginate(10)
        ]);
    }
}
