<?php

namespace App\Livewire\Materiels;

use App\Models\Materiel;
use App\Models\Materiels\MaterielAcquisition;
use Livewire\Attributes\Rule;
use Livewire\Component;

class MaterielAcquisitionLivewire extends Component
{
    public Materiel $materiel;


    public string $quantite = "1";
    public string $date_acquisition = '';
    public string $carateristiques = '';
    public string $destination = '';

    public string $numero_inventaire = '';




    protected function rules()
    {
        return [
            'quantite' => "required",
            'date_acquisition' => "required",
            'carateristiques' => "nullable",
            'destination' => ["required"],
            "numero_inventaire" => [$this->materiel->categorie == 'Equipement' ? "required" : "nullable"]
        ];
    }

    public function __construct()
    {
        $this->materiel = new Materiel();
    }


    public  function  saveAcquisiton()
    {

        $this->validate();
        if (!empty($this->materiel->id)) {
            MaterielAcquisition::create([
                'quantite' => $this->quantite,
                'carateristiques' => $this->carateristiques,
                'date_acquisition' => $this->date_acquisition,
                'numero_inventaire' => $this->numero_inventaire,
                'destination' => $this->destination,
                'materiel_id' => $this->materiel->id
            ]);
            $this->dispatch("acquisitionSaved",  $this->materiel->id);
        }
    }


    public function render()
    {
        return view('livewire.materiels.materiel-acquisition-livewire');
    }
}
