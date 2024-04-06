<?php

namespace App\Livewire\Materiels;

use App\Models\Fourniture;
use App\Models\Materiel;
use App\Models\Equipement;
use Livewire\Component;

class AcquisitionLivewire extends Component
{
    public Materiel $materiel;


    public string $quantite = "1";
    public string $date_acquisition = '';
    public string $carateristiques = '';
    public string $destination = '';
    public string $reference = '';

    public string $numero_inventaire = '';

    protected function rules()
    {
        return [
            'quantite' => "required",
            'date_acquisition' => "required",
            'carateristiques' => "nullable",
            'reference' => "nullable",
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
            if ($this->materiel->categorie == 'Equipement') {
                Equipement::create([
                    'quantite' => $this->quantite,
                    'carateristiques' => $this->carateristiques,
                    'date_acquisition' => $this->date_acquisition,
                    'numero_inventaire' => $this->numero_inventaire,
                    'destination' => $this->destination,
                    'materiel_id' => $this->materiel->id,
                    'base_quantite' =>  "1",
                    "reference" => $this->reference
                ]);
            } else {
                Fourniture::create([
                    'quantite' => $this->quantite,
                    'carateristiques' => $this->carateristiques,
                    'date_acquisition' => $this->date_acquisition,
                    'destination' => $this->destination,
                    'materiel_id' => $this->materiel->id,
                    'base_quantite' => $this->quantite,
                    "reference" => $this->reference

                ]);
            }
            $this->dispatch("acquisitionSaved");
        }
        $this->reset('quantite');
    }

    public function render()
    {
        return view('livewire.materiels.acquisition-livewire');
    }
}
